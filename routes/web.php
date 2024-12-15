<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Rute umum untuk halaman
Route::get('/', function () {
    return view('home');
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

Route::get('admin/galery-admin', function () {
    return view('galery-admin');
});

// Rute login dan logout
Route::get('admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Rute untuk halaman dashboard admin (dengan pengecekan login)
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Rute untuk halaman galeri-admin (dengan pengecekan login)
Route::get('admin/galery-admin', [AdminController::class, 'galeryAdmin'])->name('galery-admin');