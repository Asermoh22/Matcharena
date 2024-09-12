<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeagueTeamStanding extends Model
{
    protected $fillable=[
        'team_id','league_id','position','played_games','wins',
        'draws','losses','goals_scored','goals_conceded','points'
    ];


    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
