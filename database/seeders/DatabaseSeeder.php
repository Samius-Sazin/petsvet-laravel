<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            
        ]);
        $this->call(PostCommentsTableSeeder::class);
        $this->call(PostLikesTableSeeder::class);
        $this->call(QnaQuestionsTableSeeder::class);
        $this->call(QnaCategoriesTableSeeder::class);
        $this->call(QnaAnswersTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ArticleLikesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }

}
