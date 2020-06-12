<?php

namespace App\Http\Controllers\CountNumbers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountNumbersController extends Controller
{
    public function index(){
        return view("CountNumbers.index");
    }
}
