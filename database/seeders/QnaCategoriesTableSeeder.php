<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QnaCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qna_categories')->delete();
        
        \DB::table('qna_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dog',
                'created_at' => '2025-12-13 15:25:57',
                'updated_at' => '2025-12-13 15:25:57',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Cat',
                'created_at' => '2025-12-13 15:25:57',
                'updated_at' => '2025-12-13 15:25:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Rabbit',
                'created_at' => '2025-12-13 15:25:57',
                'updated_at' => '2025-12-13 15:25:57',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Bird',
                'created_at' => '2025-12-13 15:25:57',
                'updated_at' => '2025-12-13 15:25:57',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Other',
                'created_at' => '2025-12-13 15:25:57',
                'updated_at' => '2025-12-13 15:25:57',
            ),
        ));
        
        
    }
}