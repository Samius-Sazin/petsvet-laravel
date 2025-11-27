<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\QnaCategory;
use App\Models\User;
use Carbon\Carbon;

class QnaSeeder extends Seeder
{
    public function run()
    {
        
        $categories = QnaCategory::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();

        
        if (empty($categories)) {
            $catId = DB::table('qna_categories')->insertGetId(['name' => 'General', 'created_at' => now(), 'updated_at' => now()]);
            $categories = [$catId];
        }

        
        $questions = [];
        
        for ($i = 1; $i <= 20; $i++) {
            $questions[] = [
                'category_id' => $categories[array_rand($categories)], 
                'user_id'     => !empty($users) ? $users[array_rand($users)] : null, 
                'guest_name'  => empty($users) ? 'Guest User ' . $i : null,
                'title'       => "Sample Question #{$i}: My pet is showing symptom X, what to do?",
                'body'        => "This is a detailed description for sample question number {$i}. My pet has been acting strange for the last 2 days. Need advice!",
                'upvotes'     => rand(0, 50), 
                'answer_count'=> rand(0, 5),  
                'created_at'  => Carbon::now()->subDays(rand(1, 30)), 
                'updated_at'  => now(),
            ];
        }

        
        DB::table('qna_questions')->insert($questions);
    }
}