<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('class_')->delete();
        
        \DB::table('class_')->insert(array (
            0 => 
            array (
                'id' => 1,
                'department_id' => 1,
                'homeroom_teacher_id' => 1,
                'degree' => 'x',
                'name' => '1',
                'created_at' => '2022-05-08 11:10:21',
                'updated_at' => '2022-05-08 11:10:21',
            ),
        ));
        
        
    }
}