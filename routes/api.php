<?php

use App\Http\Controllers\Api\Web\HospitalWebController;
use App\Http\Controllers\Api\Web\PatientWebController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Api\Web\UserWebController;
use App\Http\Middleware\CustomAuthMidleware;

use Illuminate\Support\Facades\Route;

date_default_timezone_set('Asia/Jakarta');

Route::group([
    'prefix' => 'web/v1',
    'middleware' => [
        CustomAuthMidleware::class
    ],
], function ($router) {
    Route::get("user/datatable", [UserWebController::class, 'dataTable'])->name('api.v1.web.user.dataTable');
    Route::get("user/{user}/delete", [UserWebController::class, 'delete'])->name('api.v1.web.user.delete');

    Route::get("hospital/select2", [HospitalWebController::class, 'select2'])->name('api.v1.web.hospital.select2');
    Route::get("hospital/datatable", [HospitalWebController::class, 'dataTable'])->name('api.v1.web.hospital.dataTable');
    Route::get("hospital/{hospital}/delete", [HospitalWebController::class, 'delete'])->name('api.v1.web.hospital.delete');

    Route::get("patient/datatable", [PatientWebController::class, 'dataTable'])->name('api.v1.web.patient.dataTable');
    Route::get("patient/{patient}/delete", [PatientWebController::class, 'delete'])->name('api.v1.web.patient.delete');

    Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');
});
