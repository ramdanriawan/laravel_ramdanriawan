<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('patients')->delete();
        
        \DB::table('patients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'hospitalId' => 2,
                'patientName' => 'patientName',
                'address' => 'address',
                'email' => 'email@gmail.com',
                'phone' => '082282692470',
                'createdAt' => '2025-05-21 16:47:32',
                'updatedAt' => '2025-05-21 17:57:01',
                'deletedAt' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'hospitalId' => 1,
                'patientName' => 'patienttest',
                'address' => 'addresstest',
                'email' => 'emailtest@gmail.com',
                'phone' => '082282692471',
                'createdAt' => '2025-05-21 17:56:01',
                'updatedAt' => '2025-05-21 17:56:01',
                'deletedAt' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'hospitalId' => 1,
                'patientName' => 'patienttest 3',
                'address' => 'addresstest 3',
                'email' => 'emailtest@gmail.com3',
                'phone' => '082282692473',
                'createdAt' => '2025-05-21 17:56:01',
                'updatedAt' => '2025-05-21 17:56:01',
                'deletedAt' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'hospitalId' => 1,
                'patientName' => 'patienttest 4',
                'address' => 'addresstest 4',
                'email' => 'emailtest@gmail.com4',
                'phone' => '082282692474',
                'createdAt' => '2025-05-21 17:56:01',
                'updatedAt' => '2025-05-21 17:56:01',
                'deletedAt' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'hospitalId' => 1,
                'patientName' => 'patienttest 5',
                'address' => 'addresstest 5',
                'email' => 'emailtest@gmail.com5',
                'phone' => '082282692475',
                'createdAt' => '2025-05-21 17:56:01',
                'updatedAt' => '2025-05-21 17:56:01',
                'deletedAt' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'hospitalId' => 1,
                'patientName' => 'patienttest 6',
                'address' => 'addresstest 6',
                'email' => 'emailtest@gmail.com6',
                'phone' => '082282692476',
                'createdAt' => '2025-05-21 17:56:01',
                'updatedAt' => '2025-05-21 17:56:01',
                'deletedAt' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'hospitalId' => 1,
                'patientName' => 'patienttest 7',
                'address' => 'addresstest 7',
                'email' => 'emailtest@gmail.com7',
                'phone' => '082282692478',
                'createdAt' => '2025-05-21 17:56:01',
                'updatedAt' => '2025-05-21 17:56:01',
                'deletedAt' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'hospitalId' => 1,
                'patientName' => 'patienttest 9',
                'address' => 'addresstest 10',
                'email' => 'emailtest@gmail.com11',
                'phone' => '0822826924712',
                'createdAt' => '2025-05-21 17:56:01',
                'updatedAt' => '2025-05-21 17:56:01',
                'deletedAt' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'hospitalId' => 1,
                'patientName' => 'patienttest 11',
                'address' => 'addresstest 12',
                'email' => 'emailtest@gmail.com13',
                'phone' => '0822826924713',
                'createdAt' => '2025-05-21 17:56:01',
                'updatedAt' => '2025-05-21 17:56:01',
                'deletedAt' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'hospitalId' => 13,
                'patientName' => 'sdfsfsf',
                'address' => 'sdfsfsf',
                'email' => 'sdfsfsf@gmail.com',
                'phone' => '082282692486',
                'createdAt' => '2025-05-21 18:39:11',
                'updatedAt' => '2025-05-21 18:39:11',
                'deletedAt' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'hospitalId' => 13,
                'patientName' => 'sdfsdf',
                'address' => 'sdfsdf',
                'email' => 'hospital@gmail.com',
                'phone' => '082282692488',
                'createdAt' => '2025-05-21 18:42:33',
                'updatedAt' => '2025-05-21 18:43:45',
                'deletedAt' => NULL,
            ),
        ));
        
        
    }
}