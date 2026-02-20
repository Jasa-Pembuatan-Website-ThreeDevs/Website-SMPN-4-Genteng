<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbRegistration extends Model
{
    use HasFactory;

    protected $table = 'ppdb_registrations';

    protected $casts = [
        'birth_date' => 'date',
    ];

    protected $fillable = [
        'ppdb_batch_id',
        'name',
        'nisn',
        'birth_place',
        'birth_date',
        'gender',
        'origin_school',
        'address',
        'parent_name',
        'whatsapp',
        'photo_path',
        'kk_path',
    ];
}
