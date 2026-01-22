<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'type',
        'thumbnail',
        'user_id',
        'published_at',
        'expired_at',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'expired_at'   => 'datetime',
        'is_active'    => 'boolean',
    ];

    /* =====================
       RELATIONSHIP
    ====================== */

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /* =====================
       SCOPE (QUERY HELPER)
    ====================== */

    public function scopeAnnouncement($query)
    {
        return $query->where('type', 'announcement');
    }

    public function scopeNews($query)
    {
        return $query->where('type', 'news');
    }

    public function scopeActive($query)
    {
        return $query
            ->where('is_active', true)
            ->where('published_at', '<=', now())
            ->where(function ($q) {
                $q->whereNull('expired_at')
                  ->orWhere('expired_at', '>=', now());
            });
    }
}
