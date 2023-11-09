<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/admin-login', [LoginController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->
middleware('is_admin');

