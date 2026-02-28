<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('dashboard.guard');
})->name('dashboard.guard');

// Login Logic cho IT Admin (Xử lý Session Server)
Route::post('/admin-login', function (Request $request) {
    $user = $request->input('user');
    $pass = $request->input('pass');
    $target = $request->input('target', 'management');

    if ($user === 'ITKHA' && $pass === '123ABC') {
        $request->session()->put('admin_it_logged_in', true);
        return response()->json(['success' => true, 'url' => route('admin.' . $target)]);
    }

    return response()->json(['success' => false, 'message' => 'Thông tin không chính xác!'], 401);
})->name('admin.login.post');

// Logout Logic (Xóa Session)
Route::get('/admin-logout', function (Request $request) {
    $request->session()->forget('admin_it_logged_in');
    return redirect()->route('dashboard.guard');
})->name('admin.logout');


// Group Admin được bảo vệ bởi middleware AdminITCheck
Route::middleware(['admin.it'])->prefix('admin')->group(function () {
    Route::get('/management', function () { return view('admin.management'); })->name('admin.management');
    
    // Settings Routes
    Route::get('/settings', function () { return view('admin.settings'); })->name('admin.settings');
    Route::post('/settings/save', [App\Http\Controllers\Admin\SettingController::class, 'saveSettings'])->name('admin.settings.save');
    Route::post('/settings/test-db', [App\Http\Controllers\Admin\SettingController::class, 'testDbConnection'])->name('admin.settings.test_db');

    Route::get('/history', function () { return view('admin.history'); })->name('admin.history');
    Route::get('/statistics', function () { return view('admin.statistics'); })->name('admin.statistics');
});
