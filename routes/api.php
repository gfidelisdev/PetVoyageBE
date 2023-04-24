<?php

use App\Http\Controllers\PostController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('users/{id}', function ($id) {

    });
});

Route::prefix('friends')->group(function () {
    Route::get('/', function () {
        return json_encode(['message' => 'oi']);
    });
});

Route::prefix('user')->group(function () {
    Route::get('{author}/posts', [PostController::class, 'index']);
});
