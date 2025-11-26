<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 4,
                'title' => 'Cat Food 1kg',
                'details' => 'Premium Quality Cat Food.',
                'category' => 'Food',
                'sku' => NULL,
                'price' => '690.00',
                'offer' => '10.00',
                'quantity' => 80,
                'sold' => 1,
                'rating' => '0.0',
                'reviews' => '[]',
                'images' => '[{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764100381\\/petsvet\\/products\\/product_cat_food_1kg_1764100380.jpg","public_id":"petsvet\\/products\\/product_cat_food_1kg_1764100380"},{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764100384\\/petsvet\\/products\\/product_cat_food_1kg_1764100383.jpg","public_id":"petsvet\\/products\\/product_cat_food_1kg_1764100383"}]',
                'tags' => '["cat","food","premium"]',
                'is_active' => 1,
                'is_featured' => 0,
                'attributes' => '[]',
                'created_at' => '2025-11-25 19:53:04',
                'updated_at' => '2025-11-25 19:53:04',
            ),
            1 => 
            array (
                'id' => 5,
                'title' => 'Cute Cat House',
                'details' => 'Cute, Washable and beautiful house for you cat.',
                'category' => 'House',
                'sku' => NULL,
                'price' => '1390.00',
                'offer' => '20.00',
                'quantity' => 8,
                'sold' => 10,
                'rating' => '0.0',
                'reviews' => '[]',
                'images' => '[{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764170002\\/petsvet\\/products\\/product_cute_cat_house_1764169998.jpg","public_id":"petsvet\\/products\\/product_cute_cat_house_1764169998"},{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764170005\\/petsvet\\/products\\/product_cute_cat_house_1764170005.jpg","public_id":"petsvet\\/products\\/product_cute_cat_house_1764170005"},{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764170009\\/petsvet\\/products\\/product_cute_cat_house_1764170008.jpg","public_id":"petsvet\\/products\\/product_cute_cat_house_1764170008"},{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764170013\\/petsvet\\/products\\/product_cute_cat_house_1764170011.jpg","public_id":"petsvet\\/products\\/product_cute_cat_house_1764170011"}]',
                'tags' => '["cat","house"]',
                'is_active' => 1,
                'is_featured' => 0,
                'attributes' => '[]',
                'created_at' => '2025-11-26 15:13:35',
                'updated_at' => '2025-11-26 15:13:35',
            ),
            2 => 
            array (
                'id' => 6,
                'title' => 'Cat bag',
                'details' => 'Transparent bag for cat.',
                'category' => 'Bag',
                'sku' => NULL,
                'price' => '690.00',
                'offer' => '30.00',
                'quantity' => 20,
                'sold' => 0,
                'rating' => '0.0',
                'reviews' => '[]',
                'images' => '[{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764185186\\/petsvet\\/products\\/product_cat_bag_1764185184.jpg","public_id":"petsvet\\/products\\/product_cat_bag_1764185184"},{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764185189\\/petsvet\\/products\\/product_cat_bag_1764185188.jpg","public_id":"petsvet\\/products\\/product_cat_bag_1764185188"}]',
                'tags' => '["cat","bag"]',
                'is_active' => 1,
                'is_featured' => 0,
                'attributes' => '[]',
                'created_at' => '2025-11-26 19:26:32',
                'updated_at' => '2025-11-26 19:26:32',
            ),
            3 => 
            array (
                'id' => 7,
                'title' => 'Cat grooming item',
                'details' => 'Cat brush for clean their fur.',
                'category' => 'Grooming',
                'sku' => NULL,
                'price' => '90.00',
                'offer' => '0.00',
                'quantity' => 200,
                'sold' => 0,
                'rating' => '0.0',
                'reviews' => '[]',
                'images' => '[{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764185300\\/petsvet\\/products\\/product_cat_grooming_item_1764185299.jpg","public_id":"petsvet\\/products\\/product_cat_grooming_item_1764185299"},{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764185303\\/petsvet\\/products\\/product_cat_grooming_item_1764185302.jpg","public_id":"petsvet\\/products\\/product_cat_grooming_item_1764185302"},{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764185304\\/petsvet\\/products\\/product_cat_grooming_item_1764185305.jpg","public_id":"petsvet\\/products\\/product_cat_grooming_item_1764185305"}]',
                'tags' => '["Cat","Dog","Grooming items"]',
                'is_active' => 1,
                'is_featured' => 0,
                'attributes' => '[]',
                'created_at' => '2025-11-26 19:28:27',
                'updated_at' => '2025-11-26 19:28:27',
            ),
            4 => 
            array (
                'id' => 8,
                'title' => 'Pet toys',
                'details' => 'Cat or pet toys.',
                'category' => 'Toy',
                'sku' => NULL,
                'price' => '390.00',
                'offer' => '10.00',
                'quantity' => 360,
                'sold' => 0,
                'rating' => '0.0',
                'reviews' => '[]',
                'images' => '[{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764185466\\/petsvet\\/products\\/product_pet_toys_1764185465.jpg","public_id":"petsvet\\/products\\/product_pet_toys_1764185465"},{"url":"https:\\/\\/res.cloudinary.com\\/dlfapqdak\\/image\\/upload\\/v1764185468\\/petsvet\\/products\\/product_pet_toys_1764185468.jpg","public_id":"petsvet\\/products\\/product_pet_toys_1764185468"}]',
                'tags' => '["Cat","Pet","Dog","Toys"]',
                'is_active' => 1,
                'is_featured' => 0,
                'attributes' => '[]',
                'created_at' => '2025-11-26 19:31:10',
                'updated_at' => '2025-11-26 19:31:10',
            ),
        ));
        
        
    }
}