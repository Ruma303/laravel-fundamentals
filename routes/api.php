<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    use App\Http\Controllers\Api\V1\MovieController;
    Route::apiResource('movies', MovieController::class);

    /* Route::get('movies', [MovieController::class, 'index']);
    Route::get('movies/{movie}', [MovieController::class, 'show']); */


Route::prefix('v1')->group(function () {
    Route::apiResource('movies', MovieController::class);
});
