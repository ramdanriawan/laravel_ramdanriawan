<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HospitalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('hospitals')->delete();
        
        \DB::table('hospitals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'hospitalName' => 'sdfsdgs',
                'address' => 'sdfsfs',
                'email' => 'sfsf@gmail.com',
                'phone' => '082282692480',
                'createdAt' => '2025-05-21 16:47:12',
                'updatedAt' => '2025-05-21 17:48:56',
                'deletedAt' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'hospitalName' => 'sdfsdgs2',
                'address' => 'sdfsfs2',
                'email' => 'sfsf2@gmail.com',
                'phone' => '082282692481',
                'createdAt' => '2025-05-21 16:47:12',
                'updatedAt' => '2025-05-21 17:49:08',
                'deletedAt' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'hospitalName' => 'sdfsdgs23',
                'address' => 'sdfsfs23',
                'email' => 'sfsf23@gmail.com',
                'phone' => '082282692482',
                'createdAt' => '2025-05-21 16:47:12',
                'updatedAt' => '2025-05-21 17:49:16',
                'deletedAt' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'hospitalName' => 'sdfsdgs234',
                'address' => 'sdfsfs234',
                'email' => 'sfsf234@gmail.com',
                'phone' => '082282692483',
                'createdAt' => '2025-05-21 16:47:12',
                'updatedAt' => '2025-05-21 17:49:25',
                'deletedAt' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'hospitalName' => 'sdfsdgs2345',
                'address' => 'sdfsfs2345',
                'email' => 'sfsf2345@gmail.com',
                'phone' => '082282692484',
                'createdAt' => '2025-05-21 16:47:12',
                'updatedAt' => '2025-05-21 17:49:33',
                'deletedAt' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'hospitalName' => 'sdfsdgs23456',
                'address' => 'sdfsfs23456',
                'email' => 'sfsf23456@gmail.com',
                'phone' => '082282692485',
                'createdAt' => '2025-05-21 16:47:12',
                'updatedAt' => '2025-05-21 17:49:44',
                'deletedAt' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'hospitalName' => 'sdfsdgs234567',
                'address' => 'sdfsfs234567',
                'email' => 'sfsf234567@gmail.com',
                'phone' => '082282692486',
                'createdAt' => '2025-05-21 16:47:12',
                'updatedAt' => '2025-05-21 17:50:13',
                'deletedAt' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'hospitalName' => 'sdfsdgs2345678',
                'address' => 'sdfsfs2345678',
                'email' => 'sfsf2345678@gmail.com',
                'phone' => '082282692487',
                'createdAt' => '2025-05-21 16:47:12',
                'updatedAt' => '2025-05-21 17:50:27',
                'deletedAt' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'hospitalName' => 'sdfsdgs23456789',
                'address' => 'sdfsfs23456789',
                'email' => 'sfsf23456789@gmail.com',
                'phone' => '082282692466',
                'createdAt' => '2025-05-21 16:47:12',
                'updatedAt' => '2025-05-21 17:50:37',
                'deletedAt' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'hospitalName' => 'sdfsdgs234567890',
                'address' => 'sdfsfs234567890',
                'email' => 'sfsf2345678902@gmail.com',
                'phone' => '082282692467',
                'createdAt' => '2025-05-21 16:47:12',
                'updatedAt' => '2025-05-21 17:50:51',
                'deletedAt' => NULL,
            ),
            10 => 
            array (
                'id' => 12,
                'hospitalName' => 'sdfsdgs2345678901',
                'address' => 'sdfsfs2345678901',
                'email' => 'sfsf2345678901@gmail.com',
                'phone' => '082282692468',
                'createdAt' => '2025-05-21 16:47:12',
                'updatedAt' => '2025-05-21 17:51:02',
                'deletedAt' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'hospitalName' => 'hospitalName',
                'address' => 'address',
                'email' => 'email@gmail.com',
                'phone' => '082282692469',
                'createdAt' => '2025-05-21 17:32:59',
                'updatedAt' => '2025-05-21 17:32:59',
                'deletedAt' => NULL,
            ),
            12 => 
            array (
                'id' => 14,
                'hospitalName' => 'data 13',
                'address' => 'address 13',
                'email' => 'email13@gmail.com',
                'phone' => '082282692470',
                'createdAt' => '2025-05-21 17:33:42',
                'updatedAt' => '2025-05-21 17:33:42',
                'deletedAt' => NULL,
            ),
        ));
        
        
    }
}