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
Route::get('/ballons', function () {
    return view('Numbers/ballons');
});
Route::get('/cards-2-2', function () {
    return view('cards2by2');
});
Route::get('/cards-2-3', function () {
    return view('cards2by3');
});
Route::get('/cards-3-4', function () {
    return view('cards3by4');
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
Route::get('/insertionsort',"Sort\InsertionSortController@index");
Route::get('/gameMemory','GameMemoryController@gamememory');



