<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('departments')->delete();
        
        \DB::table('departments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'multimedia',
                'abbreviation' => 'mm',
                'created_at' => '2022-05-08 10:02:47',
                'updated_at' => '2022-05-08 10:02:47',
            ),
        ));
        
        
    }
}