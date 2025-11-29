<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $cloudinary;

    public function __construct(CloudinaryService $cloudinary)
    {
        $this->cloudinary = $cloudinary;
    }

    public function getAllProducts(Request $request)
    {
        $query = Product::where('is_active', true);

        // Filter by category
        if ($request->query('category')) {
            $query->where('category', $request->query('category'));
        }

        // Search by keyword
        if ($request->query('search')) {
            $keyword = $request->query('search');
            $query->where('title', 'like', "%{$keyword}%")
                ->orWhere('details', 'like', "%{$keyword}%");
        }

        // Sorting
        $sort = $request->query('sort', 'popular');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'latest':
                $query->orderBy('created_at', 'desc');
                break;
            default: // 'popular'
                $query->orderByDesc('sold');
                break;
        }

        $products = $query->get()->toArray();

        return view('pages.products', [
            'products' => $products,
            'productPageBanner' => asset('images/product_page_banner.png'),
            'currentSort' => $sort,
            'currentCategory' => $request->query('category', null),
            'searchKeyword' => $request->query('search', ''),
        ]);
    }

    // top 20 sold products from db
    public static function getTrendingProducts()
    {
        return Product::where('is_active', true)
            ->orderByDesc('sold')
            ->take(20)
            ->get()->toArray();
    }

    // Show single product
    public function getProductById($id)
    {
        $product = Product::findOrFail($id)->toArray();

        return view('pages.productDetails', compact('product'));
    }

    // Store new product to DB
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->validate([
                'title' => 'required|string|max:255',
                'details' => 'nullable|string',
                'category' => 'nullable|string|max:255',
                'sku' => 'nullable|string|unique:products,sku',
                'price' => 'required|numeric',
                'offer' => 'nullable|numeric',
                'quantity' => 'nullable|integer',
                'sold' => 'nullable|integer',
                'rating' => 'nullable|numeric',

                'reviews' => 'nullable|array',

                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',

                'tags' => 'nullable|string',

                'is_active' => 'nullable|boolean',
                'is_featured' => 'nullable|boolean',

                'attributes' => 'nullable|array',
                'attributes.key' => 'nullable|array',
                'attributes.value' => 'nullable|array',
            ]);

            // Convert tags
            $data['tags'] = $data['tags']
                ? array_map('trim', explode(',', $data['tags']))
                : [];

            // Convert attributes
            if ($request->has('attributes')) {
                $attrs = [];
                foreach ($request->input('attributes')['key'] as $i => $key) {
                    $value = $request->input('attributes')['value'][$i] ?? null;
                    if ($key && $value)
                        $attrs[$key] = $value;
                }
                $data['attributes'] = $attrs;
            } else {
                $data['attributes'] = [];
            }

            // Default values
            $data['sold'] ??= 0;
            $data['rating'] ??= 0;
            $data['reviews'] ??= [];
            $data['tags'] ??= [];
            $data['is_active'] ??= true;
            $data['is_featured'] ??= false;

            // Upload images
            if ($request->hasFile('images')) {
                $uploadedImages = $this->cloudinary->uploadProductImages(
                    $request->file('images'),
                    $data['title'],
                    '/products'
                );
                $data['images'] = array_values($uploadedImages);
            }

            // Save product (Eloquent ORM - Mass Assignment)
            Product::create($data);

            DB::commit();

            return redirect()->back()->with('add_product_success', 'Product added successfully!');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()->back()->with('error', 'Failed: ' . $e->getMessage());
        }
    }



    // Update product
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'details' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'sku' => 'nullable|string|unique:products,sku,' . $product->id,
            'price' => 'sometimes|required|numeric',
            'offer' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'sold' => 'nullable|integer',
            'rating' => 'nullable|numeric',
            'reviews' => 'nullable|array',
            'images' => 'nullable|array',
            'tags' => 'nullable|array',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'attributes' => 'nullable|array',
        ]);

        $product->update($data);

        return response()->json($product);
    }

    // Delete product
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
