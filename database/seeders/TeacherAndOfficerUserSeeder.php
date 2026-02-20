<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherAndOfficerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Teacher SMPN 4 Genteng',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('smp12345'),
            'role' => 'teacher'
        ]);

        User::create([
            'name' => 'Officer SMPN 4 Genteng',
            'email' => 'officer@gmail.com',
            'password' => Hash::make('smp12345'),
            'role' => 'officer'
        ]);
    }
}
