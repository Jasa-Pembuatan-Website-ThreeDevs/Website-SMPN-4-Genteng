<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PpdbBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'is_active',
        'description'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * Scope a query to only include active and in-range batches.
     */
    public function scopeActiveAndOpen($query)
    {
        $today = now()->startOfDay();
        return $query->where('is_active', true)
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today);
    }

    /**
     * Check if the batch is currently open.
     */
    public function isOpen()
    {
        $today = now()->startOfDay();
        return $this->is_active && 
               $this->start_date->startOfDay() <= $today && 
               $this->end_date->endOfDay() >= $today;
    }
}
