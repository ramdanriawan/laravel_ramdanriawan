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
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'name' => 'admin',
                'profilePicture' => NULL,
                'password' => '$2y$10$6kQ4j2zYAyq4zMCc1HPO9upQTg9PlafDTrV.tSINFGRLPL7wA6s/6',
                'level' => 'admin',
                'status' => 'active',
                'remember_token' => NULL,
                'createdAt' => '2024-06-27 10:44:27',
                'updatedAt' => '2025-05-21 15:26:32',
                'deletedAt' => NULL,
            ),
            1 => 
            array (
                'id' => 12,
                'username' => 'mahasiswa',
                'email' => 'mahasiswa@gmail.com',
                'name' => 'mahasiswa',
                'profilePicture' => NULL,
                'password' => '$2a$12$rR6YqVjBy94w0U7M.fYx5.RSW6qlZBw6.d1QPReF45EjL6wUzK22S',
                'level' => 'admin',
                'status' => 'inactive',
                'remember_token' => NULL,
                'createdAt' => '2024-10-25 01:35:46',
                'updatedAt' => '2025-05-21 18:53:05',
                'deletedAt' => NULL,
            ),
            2 => 
            array (
                'id' => 17,
                'username' => 'calon mahasiswa',
                'email' => 'calonmahasiswa@gmail.com',
                'name' => 'calon mahasiswa',
                'profilePicture' => NULL,
                'password' => '$2a$12$rR6YqVjBy94w0U7M.fYx5.RSW6qlZBw6.d1QPReF45EjL6wUzK22S',
                'level' => 'admin',
                'status' => 'active',
                'remember_token' => NULL,
                'createdAt' => '2024-10-25 01:35:46',
                'updatedAt' => '2025-05-21 18:53:09',
                'deletedAt' => NULL,
            ),
            3 => 
            array (
                'id' => 18,
                'username' => 'pimpinan',
                'email' => 'pimpinan@gmail.com',
                'name' => 'pimpinan',
                'profilePicture' => NULL,
                'password' => '$2y$10$EdkaJW2cADvxrd7o2yTEDuPzxgU983qslRolD7wIPliG71260waKS',
                'level' => 'admin',
                'status' => 'active',
                'remember_token' => NULL,
                'createdAt' => '2024-10-25 01:35:46',
                'updatedAt' => '2025-05-21 18:53:15',
                'deletedAt' => NULL,
            ),
            4 => 
            array (
                'id' => 19,
                'username' => 'dosen',
                'email' => 'dosen@gmail.com',
                'name' => 'dosen',
                'profilePicture' => NULL,
                'password' => '$2y$10$1Nv1GOZz.5ay/jPjzjybh.yCuWGjdzsy0lmwFa6dbecZagZe7dbay',
                'level' => 'admin',
                'status' => 'active',
                'remember_token' => NULL,
                'createdAt' => '2024-10-25 01:35:46',
                'updatedAt' => '2025-05-21 18:53:19',
                'deletedAt' => NULL,
            ),
            5 => 
            array (
                'id' => 20,
                'username' => 'staff',
                'email' => 'staff@gmail.com',
                'name' => 'staff',
                'profilePicture' => NULL,
                'password' => '$2y$10$SCQxuWD7Gueghit4bm5ATOzaMC8gN8MKjkWUG9Aj8k8Ikt7bahHBa',
                'level' => 'admin',
                'status' => 'active',
                'remember_token' => NULL,
                'createdAt' => '2024-10-25 01:35:46',
                'updatedAt' => '2025-05-21 18:53:23',
                'deletedAt' => NULL,
            ),
            6 => 
            array (
                'id' => 21,
                'username' => 'anonymous',
                'email' => 'anonymous@gmail.com',
                'name' => 'anonymous',
                'profilePicture' => NULL,
                'password' => '$2a$12$rR6YqVjBy94w0U7M.fYx5.RSW6qlZBw6.d1QPReF45EjL6wUzK22S',
                'level' => 'admin',
                'status' => 'active',
                'remember_token' => NULL,
                'createdAt' => '2024-10-25 01:35:46',
                'updatedAt' => '2025-05-21 18:53:28',
                'deletedAt' => NULL,
            ),
            7 => 
            array (
                'id' => 39,
                'username' => 'ramdanriawan3',
                'email' => 'ramdanriawan3@gmail.com',
                'name' => 'ramdan riawan 3',
                'profilePicture' => NULL,
                'password' => '$2y$10$Q16Ne2FDJbajxKP3a7dTE.T0iWPkuKOC1WTx2aMqUXhhvlLgqRs4m',
                'level' => 'admin',
                'status' => 'active',
                'remember_token' => NULL,
                'createdAt' => '2024-11-22 22:18:08',
                'updatedAt' => '2025-05-21 18:53:33',
                'deletedAt' => NULL,
            ),
        ));
        
        
    }
}