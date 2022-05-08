<?php

use App\Http\Controllers\PollController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('users')->prefix('users')->group(function () {
    Route::post('', [ UserController::class, 'create' ])->name('create-user');
    Route::post('auth', [ UserController::class, 'auth' ])->name('auth-user');
});

Route::middleware(['auth:sanctum'])->name('polls')->prefix('polls')->group(function () {
    Route::get('', [ PollController::class, 'all' ])->name('all-polls');
    Route::post('', [ PollController::class, 'create' ])->name('create-poll');
});
