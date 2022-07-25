<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerKaryawanController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\SupervisorManagerController;

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

            route::resource('organization-supervisor-manager', SupervisorManagerController::class);

            route::resource('organization-manager-karyawan', ManagerKaryawanController::class);
                        
        });
        

Auth::routes();
