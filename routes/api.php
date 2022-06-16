<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProofController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);



Route::middleware('auth:api')->group( function () {
    Route::get('proof', [ProofController::class, 'index']);
    Route::post('proof', [ProofController::class, 'store']);
    Route::put('proof/{id}', [ProofController::class, 'store']);
    Route::delete('proof/{id}', [ProofController::class, 'delete']);
    Route::resource('products', ProductController::class);
});
