<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MazeGameController extends Controller
{
    public function mazegame(){
        return view('MazeGame.mazeGame');
    }
}
