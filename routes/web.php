<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Static pages routes
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');

// Logout Route (Fix: Use POST method)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route (protected with authentication)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');
