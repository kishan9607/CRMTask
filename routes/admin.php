<?php

use App\Http\Controllers\AssignLeadController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'Admin')->group(function () {
    Route::get('/', [CommonController::class, 'admin'])->name('admin');

    Route::resource('users', UserController::class);
    Route::resource('leads', LeadController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('assign-leads', AssignLeadController::class);
});
