<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerStat extends Model
{
    protected $guarded = [];

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}