<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin SMPN 4 Genteng',
            'email' => 'admin@smpn4genteng.sch.id',
            'password' => Hash::make('smpn4genteng'),
            'role' => 'admin'
        ]);
    }
}
