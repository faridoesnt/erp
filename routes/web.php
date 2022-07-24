<?php

use App\Http\Middleware\Supervisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupervisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('/', [AppController::class, 'index'])->middleware('auth')->name('app');

Route::prefix('app')
        ->middleware('auth')
        ->group(function() {

            route::get('/account', [AppController::class, 'my_account'])->name('account');
        });

Route::prefix('dashboard')
        ->middleware('hr')
        ->group(function() {

            route::get('/', [DashboardController::class, 'index'])->name('dashboard');

            route::resource('supervisor', SupervisorController::class);

            route::resource('manager', ManagerController::class);

            route::resource('karyawan', KaryawanController::class);

            route::get('/karyawan/hierarchy/create', [KaryawanController::class, 'h_create'])->name('h_karyawan.create');
            route::post('/karyawan/hierarchy/store', [KaryawanController::class, 'h_store'])->name('h_karyawan.store');
            route::get('/karyawan/hierarchy/edit/{id}', [KaryawanController::class, 'h_edit'])->name('h_karyawan.edit');
            route::put('/karyawan/hierarchy/update/{id}', [KaryawanController::class, 'h_update'])->name('h_karyawan.update');
            route::delete('/karyawan/hierarchy/destroy/{id}', [KaryawanController::class, 'h_destroy'])->name('h_karyawan.destroy');

            route::get('/manager/hierarchy/create', [ManagerController::class, 'h_create'])->name('h_manager.create');
            route::post('/manager/hierarchy/store', [ManagerController::class, 'h_store'])->name('h_manager.store');
            route::get('/manager/hierarchy/edit/{id}', [ManagerController::class, 'h_edit'])->name('h_manager.edit');
            route::put('/manager/hierarchy/update/{id}', [ManagerController::class, 'h_update'])->name('h_manager.update');
            route::delete('/manager/hierarchy/destroy/{id}', [ManagerController::class, 'h_destroy'])->name('h_manager.destroy');
                        
        });
        

Auth::routes();
