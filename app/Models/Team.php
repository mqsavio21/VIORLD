<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function assistantCoach()
    {
        return $this->belongsTo(User::class, 'assistant_coach_id');
    }

    public function players()
    {
        return $this->hasMany(User::class);
    }
}
