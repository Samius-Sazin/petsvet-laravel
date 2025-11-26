<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 4,
            'name' => 'Samius Sazin (Sami)',
                'email' => 'samiussazin46@gmail.com',
                'photo' => 'https://lh3.googleusercontent.com/a/ACg8ocJG-NzayBI8M-k9MmHivGB5o8AZC4nxuKoUmqNHQCRu9RuRTou_=s96-c',
                'photo_public_id' => NULL,
                'location' => NULL,
                'bio' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$12$mp3HbA5lT4O93gk13A29.OQM0smjgnU/T.Q1vh2HGF3r7ia2xBRnG',
                'remember_token' => NULL,
                'created_at' => '2025-11-24 09:46:08',
                'updated_at' => '2025-11-24 18:46:27',
                'role' => 2,
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Samius Sazin',
                'email' => 'samiussazin45@gmail.com',
                'photo' => 'https://lh3.googleusercontent.com/a/ACg8ocKnZjGFg09whZV1r3XOCuuiV2pAgSviUkG4dmacCRjLyOArzmKP=s96-c',
                'photo_public_id' => 'petsvet/profile_photos/user_5_1764083558',
                'location' => 'Ashulia, Dhaka, Bangladesh',
                'bio' => 'I love cat',
                'email_verified_at' => NULL,
                'password' => '$2y$12$Q.qQgz8W.5KaynAeqmN9UOZHCAuXrkJpsAO.7cnYh4cid24CYz4.W',
                'remember_token' => NULL,
                'created_at' => '2025-11-24 10:46:51',
                'updated_at' => '2025-11-26 15:11:35',
                'role' => 0,
            ),
        ));
        
        
    }
}