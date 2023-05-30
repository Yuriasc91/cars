<?php

use App\Http\Controllers\Cars\CarsController;
use App\Http\Controllers\Sell\SellController;
use App\Http\Controllers\User\UserController;
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

    Route::prefix('cars')->group(function () {

        Route::get('/', [CarsController::class, 'index'])->name('cars.index');
        Route::get('/create', [CarsController::class, 'create'])->name('cars.create');
        Route::post('/store', [CarsController::class, 'store'])->name('cars.store');
        Route::get('/show/{id}', [CarsController::class, 'show'])->name('cars.show');
        Route::post('/search', [CarsController::class, 'search'])->name('cars.search');

        Route::prefix('sell')->group(function(){
            Route::get('/{id}', [SellController::class, 'index'])->name('sell.index');
            Route::get('perform/{id}', [SellController::class, 'perform'])->name('sell.perform');
            Route::post('sale', [SellController::class, 'sale'])->name('sell.sale');
        });

        Route::prefix('user')->group(function(){
            Route::get('/acquired', [UserController::class, 'acquired'])->name('user.acquired');
        });
    });
});

require __DIR__ . '/auth.php';
