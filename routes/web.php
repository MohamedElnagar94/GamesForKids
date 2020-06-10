<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/pencilInBox', function () {
    return view('Numbers/pencils');
});

Route::get('/', function () {
    return view('website.index');
});
Route::get('/contact', function () {
    return view('website.contact');
});
Route::get('/about', function () {
    return view('website.about');
});
Route::get('/games', function () {
    return view('website.games');
});
Route::get('/news', function () {
    return view('website.news');
});

Route::get('/numbers',"Numbers\NumbersController@index");
Route::get('/numbersExam',"Numbers\NumbersController@exam");
Route::get('/exam2',"Numbers\NumbersController@exam2");
Route::get('/numbersExamResult',"Numbers\NumbersController@result");
Route::get('/levels', function () {
    return view('levels');
});
Auth::routes();

Route::get('/order','SortNumberController@sortnumber');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/count',"CountNumbers\CountNumbersController@index");
Route::get('/mergesort',"Sort\MergeSortController@index");
Route::get('/quicksort',"Sort\QuickSortController@index");

