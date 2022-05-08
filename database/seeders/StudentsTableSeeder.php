<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('students')->delete();
        
        \DB::table('students')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 29,
                'class_id' => 1,
                'test_permission' => 'prohibited',
                'created_at' => '2022-05-08 11:15:10',
                'updated_at' => '2022-05-08 11:15:10',
            ),
        ));
        
        
    }
}