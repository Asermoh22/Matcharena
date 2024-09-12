<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
protected $fillable=[
'nameleague','img'
];

public function teams(){
    return $this->hasMany(Team::class);
}

public function players(){
    return $this->hasMany(Player::class);
}

public function standings()
{
    return $this->hasMany(LeagueTeamStanding::class);
}

}
