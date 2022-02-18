<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\BookingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/loginpost', [LoginController::class, 'loginPost']);
});

Route::group(['middleware' => ['level:admin,approver', 'auth']], function () {
    Route::get('/', [DashboardController::class, 'dashboard']);
    Route::resource('/user', UserController::class);
    Route::resource('/vehicle', VehicleController::class);
    Route::resource('/driver', DriverController::class);
    Route::resource('/booking', BookingController::class);
    Route::patch('/booking/{id}/approve', [BookingController::class, 'approve']);
    Route::patch('/booking/{id}/reject', [BookingController::class, 'reject']);
    Route::patch('/booking/{id}/done', [BookingController::class, 'done']);
    Route::get('/report', [BookingController::class, 'report']);
    Route::get('/export', [BookingController::class, 'export']);
});

Route::get('/logout', [LoginController::class, 'logout']);
