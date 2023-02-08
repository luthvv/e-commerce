<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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
//API Route untuk register user baru
Route::post('/register', [RegisterController::class, 'register']);

//API Route untuk login user
Route::post('/login', [LoginController::class, 'login']);

//Route yang diproteksi
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/profile', function(Request $request){
        return auth()->user();
        });

    //API untuk logout user
    Route::post('/logouot', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
