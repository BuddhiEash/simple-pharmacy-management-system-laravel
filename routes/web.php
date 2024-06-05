<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicationController;

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return json_encode(['status' => 'success', 'message' => 'welcome']);
    });
    Route::resource('customers', CustomerController::class);
    Route::resource('medication', MedicationController::class);
});
