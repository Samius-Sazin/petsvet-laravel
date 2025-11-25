<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $cloudinary;

    public function __construct(CloudinaryService $cloudinary)
    {
        $this->cloudinary = $cloudinary;
    }

    // List all products
    public function getAllProducts()
    {
        // $products = Product::where('is_active', true)
        //     ->orderBy('created_at', 'desc')
        //     ->get();
        $products = Product::where('is_active', true)->get();

        return view('pages.products', [
            'products' => $products,
            'productPageBanner' => asset('images/product_page_banner.png'),
        ]);
    }

    // Show single product
    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function store(Request $request)
    {
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

        // Step 2: Convert attributes key/value arrays into associative array
        if ($request->has('attributes')) {
            $attrs = [];
            foreach ($request->input('attributes')['key'] as $i => $key) {
                $value = $request->input('attributes')['value'][$i] ?? null;
                if ($key && $value) {
                    $attrs[$key] = $value;
                }
            }
            $data['attributes'] = $attrs;
        } else {
            $data['attributes'] = [];
        }

        // Step 3: Set default values using ??=
        $data['sold'] ??= 0;
        $data['rating'] ??= 0;
        $data['reviews'] ??= [];
        $data['tags'] ??= [];
        $data['is_active'] ??= true;
        $data['is_featured'] ??= false;

        if ($request->hasFile('images')) {
            // Upload images to Cloudinary with readable filenames
            $uploadedImages = $this->cloudinary->uploadProductImages(
                $request->file('images'),
                $data['title'],
                '/products'
            );

            $data['images'] = array_values($uploadedImages);
        }

        // Step 5: Create the product
        Product::create($data);

        // Step 6: Redirect back with success message
        return redirect()->back()->with('add_product_success', 'Product added successfully!');
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
