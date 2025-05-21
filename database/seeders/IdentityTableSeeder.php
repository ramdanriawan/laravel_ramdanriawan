<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IdentityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('identity')->delete();
        
        \DB::table('identity')->insert(array (
            0 => 
            array (
                'id' => 1,
                'appTitle' => 'PT. TERAKORP',
                'logo' => 'img/logo.png',
                'background' => 'img/background.png',
                'visi' => '',
                'mission' => '',
                'createdAt' => '2024-10-15 08:05:50',
                'updatedAt' => '2025-05-21 14:32:15',
            ),
        ));
        
        
    }
}