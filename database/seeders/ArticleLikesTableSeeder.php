<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticleLikesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('article_likes')->delete();
        
        
        
    }
}