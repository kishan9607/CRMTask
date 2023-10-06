<?php

use App\Http\Controllers\AssignLeadController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\LeadController;
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

Route::middleware('auth', 'User')->group(function () {
    Route::get('/', [CommonController::class, 'user'])->name('user');

    Route::get('/my-leads', [AssignLeadController::class, 'myLeads'])->name('my-leads');
    Route::get('/leads-edit/{id}/{status}', [AssignLeadController::class, 'changeLeadStatus']);
});
