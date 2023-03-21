<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Christopher',
                'lastname' => 'Quiñonez',
                'role' => 'Administrador',
                'email' => 'christopher@rosphrethic.com',
                'password' => '$2y$12$/TYSzprU7mfCvQmirK04WeQmUAo8iJcipZ27mlNil7mUClCLWlls.',
                'photo' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Sean',
                'lastname' => 'Mcloughlin',
                'role' => 'Director',
                'email' => 'sean@rosphrethic.com',
                'password' => '$2y$12$/TYSzprU7mfCvQmirK04WeQmUAo8iJcipZ27mlNil7mUClCLWlls.',
                'photo' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Felix',
                'lastname' => 'Kjellberg',
                'role' => 'Secretario',
                'email' => 'felix@rosphrethic.com',
                'password' => '$2y$12$/TYSzprU7mfCvQmirK04WeQmUAo8iJcipZ27mlNil7mUClCLWlls.',
                'photo' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Mark',
                'lastname' => 'Fischbach',
                'role' => 'Docente',
                'email' => 'mark@rosphrethic.com',
                'password' => '$2y$12$/TYSzprU7mfCvQmirK04WeQmUAo8iJcipZ27mlNil7mUClCLWlls.',
                'photo' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Marzia',
                'lastname' => 'Kjellberg',
                'role' => 'Docente',
                'email' => 'marzia@rosphrethic.com',
                'password' => '$2y$12$/TYSzprU7mfCvQmirK04WeQmUAo8iJcipZ27mlNil7mUClCLWlls.',
                'photo' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
