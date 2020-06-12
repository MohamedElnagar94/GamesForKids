<?php

namespace App\Http\Controllers\Sort;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MergeSortController extends Controller
{
    public function index(){
        return view("MergeSort.index");
    }
}
