<?php

use App\Http\Controllers\ContextController;
use App\Http\Controllers\MessageController;
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

Route::post('message', [MessageController::class, 'store'])->name('message.store');

Route::apiResource('context', ContextController::class)->only(['destroy']);
