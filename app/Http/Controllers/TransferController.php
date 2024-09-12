<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function transfer(){
        $transfers=Transfer::all();
        return view('transfer.main',['transfers'=>$transfers]);
    }
}
