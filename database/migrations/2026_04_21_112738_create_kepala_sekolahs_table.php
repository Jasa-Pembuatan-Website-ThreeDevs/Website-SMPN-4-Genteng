<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kepala_sekolahs', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('name');
            $blueprint->string('position')->default('Kepala Sekolah SMPN 4 Genteng');
            $blueprint->string('image')->nullable();
            $blueprint->text('bio_short')->nullable();
            $blueprint->string('education')->nullable();
            $blueprint->string('certification')->nullable();
            $blueprint->string('period')->nullable();
            $blueprint->string('email')->nullable();
            $blueprint->text('biography')->nullable();
            $blueprint->text('quote')->nullable();
            $blueprint->boolean('is_active')->default(true);
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepala_sekolahs');
    }
};
