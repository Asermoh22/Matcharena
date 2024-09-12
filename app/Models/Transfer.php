<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable=[
        'player_id','from_team','to_team','transfer_date','amount'
    ];

    public function player(){
        return $this->belongsTo(Player::class);
    }
}
