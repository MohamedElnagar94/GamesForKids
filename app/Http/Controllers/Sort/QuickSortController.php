<?php

namespace App\Http\Controllers\Sort;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuickSortController extends Controller
{
    public function index(){
        return view("QuickSort.index");
    }
}
