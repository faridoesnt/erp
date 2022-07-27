<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AttendanceController;
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
route::get('/account', [AppController::class, 'my_account'])->middleware('auth')->name('account');
route::post('/check-in', [AppController::class, 'check_in'])->middleware('auth')->name('checkIn');
route::post('/check-out', [AppController::class, 'check_out'])->middleware('auth')->name('checkOut');
route::get('/attendance-list', [AppController::class, 'attendance_list'])->middleware('auth')->name('attendanceList');

Route::prefix('dashboard')
        ->middleware('hr')
        ->group(function() {

            route::get('/', [DashboardController::class, 'index'])->name('dashboard');

            route::resource('supervisor', SupervisorController::class);
            route::get('/supervisor/setmanager/{id}', [SupervisorController::class, 'set_manager']);
            route::post('/supervisor/setmanager', [SupervisorController::class, 'store_manager']);

            route::resource('manager', ManagerController::class);
            route::get('/manager/setkaryawan/{id}', [ManagerController::class, 'set_karyawan'])->name('setKaryawan');
            route::post('/manager/setkaryawan', [ManagerController::class, 'store_karyawan'])->name('storeKaryawan');
            route::get('/manager/setsupervisor/{id}', [ManagerController::class, 'set_supervisor'])->name('setSupervisor');
            route::post('/manager/setsupervisor', [ManagerController::class, 'store_supervisor'])->name('storeSupervisor');

            route::resource('karyawan', KaryawanController::class);
            route::get('/karyawan/setmanager/{id}', [KaryawanController::class, 'set_manager'])->name('setManager');
            route::post('/karyawan/setmanager', [KaryawanController::class, 'store_manager'])->name('storeManager');

            route::delete('organization-supervisor-manager/{id}', [SupervisorManagerController::class, 'destroy'])->name('delete_manager_supervisor');

            route::delete('organization-manager-karyawan/{id}', [ManagerKaryawanController::class, 'destroy'])->name('delete_karyawan_manager');

            route::resource('attendance', AttendanceController::class);
                        
        });
        

Auth::routes();
