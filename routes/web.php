<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Request;
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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {


    Route::group(['middleware' => 'verified'], function () {

        //routes to two factors

        Route::get('/two-factor', function () {
            return view('twoFactor');
        })->name('twoFactor');

        Route::post('/autenticate-token', [AuthenticatedSessionController::class, 'autenticateToken'])->name('autenticateToken');

        Route::group(['middleware' => 'two_factor'], function () {

            Route::get('/sesiones', [SessionController::class, 'getSesions'])->name('getSesions');

            Route::post('/sesiones', [UserController::class, 'updateLastLogin'])->name('sesiones');

            Route::group(['middleware' => 'sessions'], function () {

                Route::get('/dashboard', function () {
                    return view('dashboard');
                })->name('dashboard');
            });
        });



        Route::post('/autenticate-token', [AuthenticatedSessionController::class, 'autenticateToken'])->name('autenticateToken');
    });
});


require __DIR__ . '/auth.php';

/* Route::get('ip', function () {
    auth()->user()->update(['two_factor' => NULL]);
}); */
