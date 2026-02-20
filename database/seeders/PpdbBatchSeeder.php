<?php

namespace Database\Seeders;

use App\Models\PpdbBatch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PpdbBatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PpdbBatch::factory(3)->create();
    }
}
