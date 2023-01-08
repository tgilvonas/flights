<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\FlightsLogController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {

    Route::resource('flights', FlightController::class);
    Route::get('/get-flights-page', [FlightController::class, 'getListWithCalculatedTimezones'])->name('flights.get_flights_page');
    Route::post('/ajax-delete-flight', [FlightController::class, 'ajaxDelete'])->name('flights.ajax_delete');

    Route::get('/flights-log', [FlightsLogController::class, 'index'])->name('flights_log.index');
    Route::get('/flights-log/{id}/show', [FlightsLogController::class, 'show'])->name('flights_log.show');

    // these are default Laravel Breeze routes which are not needed for this test task:
    /*
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    */
});

require __DIR__.'/auth.php';
