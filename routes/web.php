<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ParkingLotController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/parking', [DashboardController::class, 'parking'])->name('dashboard.parking');
Route::prefix('booking')->middleware(['auth'])->group(function () {
    Route::post('{parking}', [BookingController::class, 'store'])->name('booking.store');
    Route::post('door/{door}', [BookingController::class, 'openDoor'])->name('booking.door');
    Route::delete('{parking}', [BookingController::class,'delete'])->name('booking.delete');
});
Route::get('/device/door/open', [BookingController::class, 'deviceOpen']);
Route::get('/device/door/close', [BookingController::class, 'deviceClose']);
Route::get('/device/available/space', [ParkingLotController::class, 'index']);
Route::get('/parking_lot/{position}/{availability}', [ParkingLotController::class,'update']);
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
