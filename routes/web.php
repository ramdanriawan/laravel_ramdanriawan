<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\SettingController;
use App\Http\Middleware\CustomAuthMidleware;
use Illuminate\Support\Facades\Route;

date_default_timezone_set('Asia/Jakarta');

Route::get('/', function () {
    return redirect()->route('login');
})->name('welcome');

Route::prefix("/")->middleware([CustomAuthMidleware::class])->group(function () {

    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('user', UserController::class);
    Route::resource('hospital', HospitalController::class);
    Route::resource('patient', PatientController::class);


    Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');
    Route::get('setting/editUser', [SettingController::class, 'editUser'])->name('setting.editUser');
    Route::post('setting/updateUser/{user}', [SettingController::class, 'updateUser'])->name('setting.updateUser');

});

Route::get('login', [CustomAuthController::class, 'login'])->name('login');
Route::post('login', [CustomAuthController::class, 'loginPost'])->name('loginPost');
