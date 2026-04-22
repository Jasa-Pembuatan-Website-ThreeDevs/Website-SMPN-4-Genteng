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
        Schema::table('kepala_sekolahs', function (Blueprint $table) {
            if (!Schema::hasColumn('kepala_sekolahs', 'major')) {
                $table->string('major')->nullable()->after('name');
            }
        });

        Schema::table('teachers', function (Blueprint $table) {
            if (!Schema::hasColumn('teachers', 'nip')) {
                $table->string('nip')->nullable()->after('full_name');
            }
            if (!Schema::hasColumn('teachers', 'description')) {
                $table->text('description')->nullable()->after('subject_specialization');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kepala_sekolahs', function (Blueprint $table) {
            $table->dropColumn('major');
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn(['nip', 'description']);
        });
    }
};
