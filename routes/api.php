<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::resource('master', MasterController::class)->except(
        ['create', 'edit', 'index', 'show']
    );
    Route::post('logout', [AuthController::class, 'logout']);
    Route::resource('transaksi', TransaksiController::class)->except(
        ['create', 'edit', 'index', 'show'] 
    );
});

Route::get('master', [MasterController::class, 'index']);
Route::get('master/{id}', [MasterController::class, 'show']);
Route::get('transaksi', [TransaksiController::class, 'index']);
Route::get('transaksi/{id}', [TransaksiController::class, 'show']);

// Route::resource('master', MasterController::class)->except(
//     ['create', 'edit']
// );

// Route::resource('transaksi', TransaksiController::class)->except(
//     ['create', 'edit']
// );

//public route
// Route::get('masters', [MasterController::class, 'index']);
// Route::get('masters/{id}', [MasterController::class, 'show']);
// Route::post('master', [MasterController::class, 'store']);
// Route::put('master/{id}', [MasterController::class, 'update']);
// Route::delete('master/{id}', [MasterController::class, 'destroy']);
