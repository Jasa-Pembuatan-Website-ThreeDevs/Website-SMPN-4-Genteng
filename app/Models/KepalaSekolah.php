<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'major',
        'position',
        'image',
        'bio_short',
        'education',
        'certification',
        'period',
        'biography',
        'quote',
        'is_active',
    ];
}
