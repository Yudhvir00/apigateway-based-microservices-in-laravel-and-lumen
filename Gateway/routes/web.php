<?php

use Illuminate\Http\Request;
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

$prefix = config('roro.prefix', '');

Route::group(['prefix' => $prefix], function () {
    Route::get('/', function () {
        return view('welcome'); // Your current homepage
    });

    Route::get('/login', function () {
        return view('auth.login'); // You'll need to create
    });

    Route::get('/register', function () {
        return view('auth.register'); // You'll need to create this view
    });

    // Add POST routes for form submissions
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});
