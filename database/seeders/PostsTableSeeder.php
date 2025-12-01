<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 2,
                'user_id' => 4,
                'content' => 'I brought a belt for my cat.
wooooow looking so cuuute.....',
                'image_url' => 'https://res.cloudinary.com/dlfapqdak/image/upload/v1764587496/petsvet/posts/post_4_1764587491.jpg',
                'feeling' => NULL,
                'created_at' => '2025-12-01 11:11:36',
                'updated_at' => '2025-12-01 11:11:36',
            ),
        ));
        
        
    }
}