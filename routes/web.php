<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/galery', function () {
    $searchQuery = request('search'); 
    return view('galery', compact('searchQuery'));
})->name('galery'); 

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/aksara', function () {
    return view('aksara');
});

Route::get('/kalender', function () {
    return view('kalender');
});

Route::get('/about', function () {
    return view('about');
});

