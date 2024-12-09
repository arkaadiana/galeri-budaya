<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
}); 

Route::get('/galery', function () {
    return view('galery');
}); 
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
