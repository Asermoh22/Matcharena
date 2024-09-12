<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register',[Authcontroller::class,'register'])->name('auth.register');
Route::post('/handelregister',[Authcontroller::class,'handelregister'])->name('auth.handelregister');


Route::get('/login',[Authcontroller::class,'login'])->name('auth.login');
Route::post('/handellogin',[Authcontroller::class,'handellogin'])->name('auth.handellogin');

Route::get('/logout',[Authcontroller::class,'logout'])->name('auth.logout');

//////////////////////////////////////////////////////////////////////
Route::get('/main',[LeagueController::class,'main'])->name('main.leauge');


Route::get('/create',[LeagueController::class,'create'])->name('main.create');
Route::post('/store',[LeagueController::class,'store'])->name('main.store');

Route::get('/teams/show/{id}',[LeagueController::class,'show'])->name('main.show');


///////////////////////////////////////////////////////////////////////////////////////

Route::get('/teams/index',[TeamController::class,'index'])->name('teams.index');


Route::get('/player/show/{id}',[TeamController::class,'show'])->name('player.show');

Route::get('/teams/create',[TeamController::class,'create'])->name('teams.create');
Route::post('/teams/store',[TeamController::class,'store'])->name('teams.store');



////////////////////////////////////////////////////////////////////////////////////////
// Route::get('/players/index',[PlayerController::class,'index'])->name('players.index');

Route::get('/players/topscore',[PlayerController::class,'topscore'])->name('players.topscore');


Route::get('/players/create',[PlayerController::class,'create'])->name('players.create');
Route::post('/players/store',[PlayerController::class,'store'])->name('players.store');

Route::get('latest/transfer',[TransferController::class,'transfer'])->name('transfer.player');



Route::get('/news/create',[PlayerController::class,'createnews'])->name('news.create');
Route::post('/news/store',[PlayerController::class,'storenews'])->name('news.store');


Route::get('/news/index',[PlayerController::class,'index'])->name('news.index');

Route::get('/aboutus',[PlayerController::class,'vv'])->name('aboutus.main');
