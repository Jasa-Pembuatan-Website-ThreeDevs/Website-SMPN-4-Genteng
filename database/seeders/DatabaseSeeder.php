<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;
use App\Models\Post;
use App\Models\Facility;
use App\Models\Achievement;
use App\Models\Announcement;
use App\Models\PpdbBatch;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's' database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();
        Post::truncate();
        Facility::truncate();
        Achievement::truncate();
        Announcement::truncate();
        PpdbBatch::truncate();

        Schema::enableForeignKeyConstraints();

        $this->call([
            AdminUserSeeder::class,
            TeacherAndOfficerUserSeeder::class,
            PostSeeder::class,
            FacilitySeeder::class,
            AchievementSeeder::class,
            AnnouncementSeeder::class,
            PpdbBatchSeeder::class,
        ]);
    }
}
