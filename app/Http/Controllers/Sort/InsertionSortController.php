<?php

namespace App\Http\Controllers\Sort;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsertionSortController extends Controller
{
    public function index(){
        return view("InsertionSort.index");
    }
}
