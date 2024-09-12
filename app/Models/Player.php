<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable=[
        'name','team_id','img','position','jersey_number','goals_scored','assists','nationality'
    ];

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function transfer(){
        return $this->hasMany(Transfer::class);
    }
    
}
