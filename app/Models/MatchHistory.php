<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatchHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'opponent',
        'map',
        'mode',
        'match_date',
        'score',
        'result',
        'link',
        'notes',
    ];

    protected $casts = [
        'match_date' => 'datetime',
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
