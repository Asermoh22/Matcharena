<?php

namespace App\Http\Controllers;

use App\Models\Gamedaily;
use App\Models\League;
use App\Models\Player;

use App\Models\Team;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function main(){
        $leagues=League::all();
        return view("main.leauge" , ["leagues"=> $leagues]);
    }

    public function create(){
        return view('main.create');
    }

    public function store(Request $request){
        $request->validate([
            'nameleague'=>'required | string',
            'img'=> 'required |image ',
        ]);

        $nameleague=$request->nameleague;
        $img=$request->file('img');
        $exe=$img->getClientOriginalExtension();
        $nameimage= 'league -'. uniqid() . $exe;
        $img->move(public_path('uploads/leagues'),$nameimage);

        League::create([
            'nameleague'=>$nameleague,
            'img'=>$nameimage,
        ]);


        return redirect(route('main.leauge'));
    }

    public function show($id)
    {
        $league = League::findOrFail($id);
    
        $teams = Team::where('league_id', $id)->get();

        $dailygames=Gamedaily::where('league_id',$id)->get();
    
        $topPlayersByLeague = Player::whereIn('team_id', $teams->pluck('id'))
            ->orderBy('goals_scored', 'desc')
            ->take(10) 
            ->get();

            $standing = $league->standings()->orderBy('position')->get();


        return view('teams.teams', [
            'league' => $league,
            'teams' => $teams,
            'topPlayersByLeague' => $topPlayersByLeague,
            'standing' => $standing,
            'dailygames'=>$dailygames

        ]);
    }

    // public function standing($id){
    //     $standing=League::findOrFail($id)->standings()->orderBy('position')->get();

    //     dd($standing);

    //     return view('teams.teams', ['standing' => $standing]);
    // }
    
}
