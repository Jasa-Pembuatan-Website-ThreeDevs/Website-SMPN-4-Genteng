<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ppdb_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ppdb_batch_id')->nullable()->constrained('ppdb_batches')->onDelete('set null');
            $table->string('name');
            $table->string('nisn');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('gender', ['L','P']);
            $table->string('origin_school');
            $table->text('address');
            $table->string('parent_name');
            $table->string('whatsapp');
            $table->string('photo_path')->nullable();
            $table->string('kk_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppdb_registrations');
    }
};
