<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable=[
        'nameteams','img','league_id'
    ];

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function players(){
        return $this->hasMany(Player::class);
    }

    public function standings()
    {
        return $this->hasMany(LeagueTeamStanding::class);
    }

    public function homeGames()
    {
        return $this->hasMany(Gamedaily::class, 'home_team_id');
    }

    // A team can be the away team in many games
    public function awayGames()
    {
        return $this->hasMany(Gamedaily::class, 'away_team_id');
    }
}
