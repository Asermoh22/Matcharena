<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\LeagueController;
use App\Models\League;


class TeamController extends Controller
{
    public function index(){
        $teams=Team::all();
        return view("teams.teams" , ["teams"=> $teams]);
    }

    public function create(){
        $leagues = League::all(); // Fetch all leagues

        return view('teams.create' ,['leagues'=>$leagues]);
    }

    public function store(Request $request){
        $request->validate([
            'nameteams'=>'required | string',
            'img'=> 'required |image ',
        ]);

        $nameteams=$request->nameteams;
        $league_id=$request->league_id;
        $img=$request->file('img');
        $exe=$img->getClientOriginalExtension();
        $nameimage= 'team -'. uniqid() . $exe;
        $img->move(public_path('uploads/teams'),$nameimage);

        Team::create([
            'nameteams'=>$nameteams,
            'league_id'=>$league_id,
            'img'=>$nameimage,
        ]);


        return redirect(route('main.leauge'));
    }

    public function show($id){
        $team = Team::findOrFail($id); 
        

        $playersByPosition = Player::where('team_id', $id)
        ->orderByRaw("FIELD(position,'Goalkeeper', 'defender', 'midfielder', 'forward')")
        ->get()
          ->groupBy('position');
        
        return view("players.player", [
            "playersByPosition" => $playersByPosition, 
            "team" => $team,
        ]);
    }
    
    
    

  
}
