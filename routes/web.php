<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/projects', function () {
    return view('projects');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/news/{id}', function () {
    return view('singlenews');
});

Route::get('/stock', function () {
    return view('stock');
});

Route::get('/stock/{slug}', function () {
    return view('singlestock');
});


Route::get('/team', function () {
    return view('team');
});

Route::get('/vacancy', function () {
    return view('vacancy');
});

Route::get('/contacts', function () {
    return view('contacts');
});
