<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'episode',
        'act',
        'month',
        'peak_rating',
        'playtime',
        'wins',
        'win_percentage',
        'kd_ratio',
        'hs_percentage',
        'top_agent',
        'recorded_at',
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(User::class, 'player_id');
    }
}
