<?php

namespace App\Http\Controllers\Numbers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NumbersController extends Controller
{
    public function index(){
        return view("Numbers.explainNumbers");
    }
    public function exam(){
        return view("Numbers.exam");
    }
    public function exam2(){
        return view("Numbers.exam2");
    }
    public function result(){
        return view("Numbers.result");
    }
}
