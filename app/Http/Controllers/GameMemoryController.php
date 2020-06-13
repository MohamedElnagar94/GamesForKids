<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameMemoryController extends Controller
{
    public function gamememory(){
        return view('GameMemory.gameMemory');
    }
}
