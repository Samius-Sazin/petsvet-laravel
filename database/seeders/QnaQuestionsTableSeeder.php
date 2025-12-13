<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QnaQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qna_questions')->delete();
        
        \DB::table('qna_questions')->insert(array (
            0 => 
            array (
                'id' => 11,
                'category_id' => 2,
                'user_id' => NULL,
                'guest_name' => NULL,
                'guest_email' => NULL,
                'title' => 'What are the signs of dehydration in cats?',
                'body' => 'Cats can hide illnesses well, so recognizing dehydration early is crucial for their health.',
                'upvotes' => 0,
                'answer_count' => 0,
                'created_at' => '2025-12-13 15:31:14',
                'updated_at' => '2025-12-13 15:31:14',
            ),
            1 => 
            array (
                'id' => 12,
                'category_id' => 5,
                'user_id' => NULL,
                'guest_name' => NULL,
                'guest_email' => NULL,
                'title' => 'How can I prevent obesity in my pets?',
                'body' => 'Obesity can lead to serious health issues such as diabetes, heart disease, and joint problems.',
                'upvotes' => 0,
                'answer_count' => 0,
                'created_at' => '2025-12-13 15:31:35',
                'updated_at' => '2025-12-13 15:31:35',
            ),
            2 => 
            array (
                'id' => 13,
                'category_id' => 1,
                'user_id' => NULL,
                'guest_name' => NULL,
                'guest_email' => NULL,
                'title' => 'How often should I take my dog to the vet?',
                'body' => 'Regular veterinary visits help prevent illnesses, keep vaccinations up-to-date, and detect health problems early.',
                'upvotes' => 1,
                'answer_count' => 1,
                'created_at' => '2025-12-13 15:33:54',
                'updated_at' => '2025-12-13 15:35:42',
            ),
        ));
        
        
    }
}