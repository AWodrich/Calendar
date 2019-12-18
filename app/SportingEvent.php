<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportingEvent extends Model
{

    protected $fillable = ['_home_id', '_outward_id'];

    public function hometeam()
    {
        return $this->belongsTo(Club::class, '_home_id');
    }

    public function outwardteam()
    {
        return $this->belongsTo(Club::class, '_outward_id');
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class, '_discipline_id');
    }
}
