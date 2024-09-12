<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\News;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    
    public function create(){

         return view('players.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required | string',
            'img'=> 'required |image ',
            'position'=>'required | string',
            'jersey_number' => 'required|numeric|min:1|max:99',
            'goals_scored'=>'required|numeric',
            'assists'=>'required|numeric',
            'nationality'=>'required | string'

        ]);

      //  $team=Team::all();

        $name=$request->name;
        $team_id=$request->team_id;
        $position=$request->position;
        $nationality=$request->nationality;
        $jersey_number=$request->jersey_number;
        $goals_scored=$request->goals_scored;
        $assists=$request->assists;
        $img=$request->file('img');
        $exe=$img->getClientOriginalExtension();
        $nameimage= 'team -'. uniqid() . $exe;
        $img->move(public_path('uploads/players/arsenal'),$nameimage);

        Player::create([
            'name'=>$name,
            'team_id'=>$team_id,
            'position'=>$position,
            'jersey_number'=>$jersey_number,
            'goals_scored'=>$goals_scored,
            'assists'=>$assists,
            'img'=>$nameimage,
            'nationality'=>$nationality,
        ]);


        return redirect(route('main.leauge'));
    }


    public function createnews(){
        return view('news.create');
    }

    public function storenews(Request $request){
        $request->validate([
            'title'=>'required | string',
            'body'=>'required | string ',
            'author' => 'required |string',
            'img'=> 'required |image ',


        ]);

        $title=$request->title;
        $body=$request->body;
        $author=$request->author;
        $img=$request->file('img');
        $exe=$img->getClientOriginalExtension();
        $nameimagenews= 'News -'. uniqid() . $exe;
        $img->move(public_path('uploads/News'),$nameimagenews);  
        
        News::create([
            'title'=>$title,
            'body'=>$body,
            'author'=>$author,
            'img'=>$nameimagenews,
        ]);

        return redirect(route('main.leauge'));
        

    }


    public function index(){
        $news=News::all();
        return view('news.main',['news'=>$news]);
    }


    public function vv(){
        return view('aboutus.main');
    }
   

  
}
