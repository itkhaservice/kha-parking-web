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
    return view('dashboard.guard');
})->name('dashboard.guard');

Route::get('/sys-check', function () {
    // ... existing sys-check code ...
});

// Admin Dashboard & Features
Route::prefix('admin')->group(function () {
    Route::get('/management', function () { return view('admin.management'); })->name('admin.management');
    Route::get('/settings', function () { return view('admin.settings'); })->name('admin.settings');
    Route::get('/history', function () { return view('admin.history'); })->name('admin.history');
    Route::get('/statistics', function () { return view('admin.statistics'); })->name('admin.statistics');
});
