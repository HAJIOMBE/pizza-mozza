<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');




Route::get('/admin/pesanan', function () {
    return view('admin.pesanan');
})->name('admin.pesanan');




Route::resource('/admin/karyawan', KaryawanController::class)
    ->parameters([
        'karyawan' => 'karyawan'
    ])
    ->names('karyawan');




Route::resource('/admin/data-admin', AdminController::class)
    ->parameters([
        'data-admin' => 'admin'
    ])
    ->names('admin.admins');