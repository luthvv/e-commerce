<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\frontend\shoppingController;
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

// Route::get('login', [
//     'as' => 'login',
//     'uses' => 'Auth\LoginController@showLoginForm'
//   ]);
//   Route::post('login', [
//     'as' => '',
//     'uses' => 'Auth\LoginController@login'
//   ]);
//   Route::post('logout', [
//     'as' => 'logout',
//     'uses' => 'Auth\LoginController@logout'
//   ]);

//   // Password Reset Routes...
//   Route::post('password/email', [
//     'as' => 'password.email',
//     'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
//   ]);
//   Route::get('password/reset', [
//     'as' => 'password.request',
//     'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
//   ]);
//   Route::post('password/reset', [
//     'as' => 'password.update',
//     'uses' => 'Auth\ResetPasswordController@reset'
//   ]);
//   Route::get('password/reset/{token}', [
//     'as' => 'password.reset',
//     'uses' => 'Auth\ResetPasswordController@showResetForm'
//   ]);


Auth::routes();

  // Registration Routes...
Route::get('register', ['as' => 'register','uses' => 'Auth\RegisterController@showRegistrationCheck']);
Route::post('register', ['as' => 'registerProcess','uses' => 'Auth\RegisterController@registrationCheck']);

Route::get('register/verification', [ 'as' => 'registerVerification', 'uses' => 'Auth\RegisterController@showRegistrationVerification']);
Route::post('register/verification', [ 'as' => 'registerVerificationProcess', 'uses' => 'Auth\RegisterController@registrationVerification']);

Route::get('register/verificated', ['as' => 'registerVerificated', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register/verificated', [ 'as' => 'registerVerificatedProcess', 'uses' => 'Auth\RegisterController@register']);


Route::get('/', [shoppingController::class, 'index'])->name('landing');

Route::get('/product/{name}', [shoppingController::class, 'productDetail'])->name('productDetail');

Route::get('/promo', [shoppingController::class, 'promo'])->name('promo');

Route::get('/store/{name}', [shoppingController::class, 'storeDetail'])->name('storeDetail');

Route::get('/categories', [shoppingController::class, 'categories'])->name('categories');

Route::get('/category/{name}', [shoppingController::class, 'category'])->name('category');



// Route::get('/register', [RegisterController::class, 'index'])->name('registerCheck');
