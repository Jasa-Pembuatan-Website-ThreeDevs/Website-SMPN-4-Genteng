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
     * Mendapatkan gelombang yang sedang aktif saat ini.
     * Gelombang dianggap aktif jika ditandai is_active = true
     * DAN berada dalam rentang tanggal start_date sampai end_date.
     */
    public static function current()
    {
        $today = \Carbon\Carbon::today();

        return self::where('is_active', true)
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->first();
    }

    /**
     * Mengecek apakah gelombang sudah berakhir (melewati end_date).
     */
    public function isExpired()
    {
        return $this->end_date->isPast() && !$this->end_date->isToday();
    }

    /**
     * Mengecek apakah gelombang belum dimulai.
     */
    public function isUpcoming()
    {
        return $this->start_date->isFuture();
    }

    /**
     * Mengecek apakah gelombang sedang berjalan (dalam rentang tanggal).
     */
    public function isInRange()
    {
        $today = \Carbon\Carbon::today();
        return $this->start_date->lte($today) && $this->end_date->gte($today);
    }
}
