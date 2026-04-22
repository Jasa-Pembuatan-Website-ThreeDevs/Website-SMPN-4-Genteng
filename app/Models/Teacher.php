<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'image',
        'full_name',
        'nip',
        'email',
        'phone_number',
        'subject_specialization',
        'description',
    ];
}
