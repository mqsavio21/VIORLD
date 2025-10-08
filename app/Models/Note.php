<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }
}