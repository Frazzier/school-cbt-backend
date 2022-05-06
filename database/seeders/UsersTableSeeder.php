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
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@email.com',
                'role' => 'admin',
                'email_verified_at' => NULL,
                'password' => '$2y$10$eP3bSXm6fDXFaCGI1kUzR.2g87w7K6WWKREqhYCCmMkArn1SJ.JbS',
                'remember_token' => NULL,
                'created_at' => '2021-09-17 04:29:10',
                'updated_at' => '2021-09-17 04:29:10',
            ),
        ));
        
        
    }
}