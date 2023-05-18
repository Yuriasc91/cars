<?php

use App\Http\Controllers\Cars\CarsController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/cars', [CarsController::class, 'index'])->name('cars.index');
    Route::get('/cars/create', [CarsController::class, 'create'])->name('cars.create');
    Route::post('/cars/store', [CarsController::class, 'store'])->name('cars.store');
    Route::get('/cars/show/{id}', [CarsController::class, 'show'])->name('cars.show');
});

require __DIR__ . '/auth.php';
