<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepalaSekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'image',
        'bio_short',
        'education',
        'certification',
        'period',
        'email',
        'biography',
        'quote',
        'is_active',
    ];
}
