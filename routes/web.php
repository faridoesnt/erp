<?php

use App\Http\Middleware\Supervisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HierarchyKaryawanController;
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


Route::get('/', [AppController::class, 'index'])->name('app')->middleware('auth');

Route::prefix('dashboard')
        ->middleware('hr')
        ->group(function() {

            route::get('/', [DashboardController::class, 'index'])->name('dashboard');

            route::resource('supervisor', SupervisorController::class);

            route::resource('manager', ManagerController::class);

            route::resource('karyawan', KaryawanController::class);

            route::resource('hierarchy_karyawan', HierarchyKaryawanController::class);
                        
        });
        

Auth::routes();
