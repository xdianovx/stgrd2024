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
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/projects/{slug}', function () {
    return view('project');
})->name('projects.view');


Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/news/{id}', function () {
    return view('singlenews');
})->name('news.view');

Route::get('/stock', function () {
    return view('stock');
})->name('stock');

Route::get('/stock/{slug}', function () {
    return view('singlestock');
})->name('stock.view');


Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/vacancy', function () {
    return view('vacancy');
})->name('vacancy');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');
