<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'app_name' => NULL,
                'logo' => NULL,
                'small_logo' => NULL,
                'auth_background' => NULL,
            ),
        ));
        
        
    }
}