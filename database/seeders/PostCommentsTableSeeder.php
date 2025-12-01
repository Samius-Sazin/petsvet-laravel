<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostCommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_comments')->delete();
        
        
        
    }
}