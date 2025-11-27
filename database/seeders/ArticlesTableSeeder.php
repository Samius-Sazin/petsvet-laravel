<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('articles')->delete();
        
        \DB::table('articles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 4,
                'title' => 'Understanding Your Pet\'s Body Language: Signs of Illness',
                'content' => 'Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor. Understanding your pet\'s body language is crucial for early detection of health issues. Pets communicate through subtle changes in behavior, posture, and movement. Learn to recognize the warning signs that indicate your furry friend may need medical attention.',
                'image' => 'https://res.cloudinary.com/dgefiku3r/image/upload/v1764262321/blog-1_g6tscq.jpg',
                'category' => 'Pet Health',
                'created_at' => '2024-10-12 10:00:00',
                'updated_at' => '2024-10-12 10:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 4,
                'title' => 'Understanding Your Pet\'s Body Language: Signs of Illness',
                'content' => 'Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor. Understanding your pet\'s body language is crucial for early detection of health issues. Pets communicate through subtle changes in behavior, posture, and movement. Learn to recognize the warning signs that indicate your furry friend may need medical attention.',
                'image' => 'https://res.cloudinary.com/dgefiku3r/image/upload/v1764262321/blog-2_t8s4hy.jpg',
                'category' => 'Pet Health',
                'created_at' => '2024-10-12 11:00:00',
                'updated_at' => '2024-10-12 11:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 4,
                'title' => 'Understanding Your Pet\'s Body Language: Signs of Illness',
                'content' => 'Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor. Understanding your pet\'s body language is crucial for early detection of health issues. Pets communicate through subtle changes in behavior, posture, and movement. Learn to recognize the warning signs that indicate your furry friend may need medical attention.',
                'image' => 'https://res.cloudinary.com/dgefiku3r/image/upload/v1764262321/blog-5_yckqz6.jpg',
                'category' => 'Pet Health',
                'created_at' => '2024-10-12 12:00:00',
                'updated_at' => '2024-10-12 12:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'title' => 'Understanding Your Pet\'s Body Language: Signs of Illness',
                'content' => 'Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor. Understanding your pet\'s body language is crucial for early detection of health issues. Pets communicate through subtle changes in behavior, posture, and movement. Learn to recognize the warning signs that indicate your furry friend may need medical attention.',
                'image' => 'https://res.cloudinary.com/dgefiku3r/image/upload/v1764262321/blog-6_ydudjc.jpg',
                'category' => 'Pet Health',
                'created_at' => '2024-10-12 13:00:00',
                'updated_at' => '2024-10-12 13:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 4,
                'title' => 'Understanding Your Pet\'s Body Language: Signs of Illness',
                'content' => 'Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor. Understanding your pet\'s body language is crucial for early detection of health issues. Pets communicate through subtle changes in behavior, posture, and movement. Learn to recognize the warning signs that indicate your furry friend may need medical attention.',
                'image' => 'https://res.cloudinary.com/dgefiku3r/image/upload/v1764262322/blog-3_jcat1a.jpg',
                'category' => 'Pet Health',
                'created_at' => '2024-10-12 14:00:00',
                'updated_at' => '2024-10-12 14:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 4,
                'title' => 'Understanding Your Pet\'s Body Language: Signs of Illness',
                'content' => 'Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor. Understanding your pet\'s body language is crucial for early detection of health issues. Pets communicate through subtle changes in behavior, posture, and movement. Learn to recognize the warning signs that indicate your furry friend may need medical attention.',
                'image' => 'https://res.cloudinary.com/dgefiku3r/image/upload/v1764262322/blog-9_zd0aio.jpg',
                'category' => 'Pet Health',
                'created_at' => '2024-10-12 15:00:00',
                'updated_at' => '2024-10-12 15:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 4,
                'title' => 'Understanding Your Pet\'s Body Language: Signs of Illness',
                'content' => 'Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor. Understanding your pet\'s body language is crucial for early detection of health issues. Pets communicate through subtle changes in behavior, posture, and movement. Learn to recognize the warning signs that indicate your furry friend may need medical attention.',
                'image' => 'https://res.cloudinary.com/dgefiku3r/image/upload/v1764262321/blog-4_umnii7.jpg',
                'category' => 'Pet Health',
                'created_at' => '2024-10-12 16:00:00',
                'updated_at' => '2024-10-12 16:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 4,
                'title' => 'Understanding Your Pet\'s Body Language: Signs of Illness',
                'content' => 'Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor. Understanding your pet\'s body language is crucial for early detection of health issues. Pets communicate through subtle changes in behavior, posture, and movement. Learn to recognize the warning signs that indicate your furry friend may need medical attention.',
                'image' => 'https://res.cloudinary.com/dgefiku3r/image/upload/v1764262322/blog-7_mkklma.jpg',
                'category' => 'Pet Health',
                'created_at' => '2024-10-12 17:00:00',
                'updated_at' => '2024-10-12 17:00:00',
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 4,
                'title' => 'Understanding Your Pet\'s Body Language: Signs of Illness',
                'content' => 'Lorem ipsum dolor sit amet consectetur. Arcu magna nam nibh ultricies. Duis at congue ultrices at. Praesent risus risus tortor. Understanding your pet\'s body language is crucial for early detection of health issues. Pets communicate through subtle changes in behavior, posture, and movement. Learn to recognize the warning signs that indicate your furry friend may need medical attention.',
                'image' => 'https://res.cloudinary.com/dgefiku3r/image/upload/v1764262322/blog-8_gkh7yy.jpg',
                'category' => 'Pet Health',
                'created_at' => '2024-10-12 18:00:00',
                'updated_at' => '2024-10-12 18:00:00',
            ),
        ));
        
        
    }
}

