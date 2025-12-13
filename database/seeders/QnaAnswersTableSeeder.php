<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QnaAnswersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qna_answers')->delete();
        
        \DB::table('qna_answers')->insert(array (
            0 => 
            array (
                'id' => 11,
                'question_id' => 13,
                'user_id' => NULL,
            'responder_name' => 'Sami Sazin (Admin)',
                'body' => 'Dogs should visit the vet at least once a year for a general check-up, vaccinations, and parasite prevention. Puppies and senior dogs may need more frequent visits.',
                'created_at' => '2025-12-13 15:35:29',
                'updated_at' => '2025-12-13 15:35:29',
            ),
        ));
        
        
    }
}