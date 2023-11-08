<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home'
)->middleware('is_admin');

