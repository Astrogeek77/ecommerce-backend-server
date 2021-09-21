<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::post('/register', [ UserController::class, 'RegisterUser']);
Route::post('/login', [ UserController::class, 'LoginUser']);

Route::post('/addproduct', [ ProductController::class, 'AddProduct']);
Route::get('/listproducts', [ProductController::class, 'ShowList']);
Route::get('/product/{id}', [ProductController::class, 'ShowProduct']);

Route::put('/update/{id}', [ProductController::class, 'UpdateProduct']);
Route::delete('/delete/{id}', [ProductController::class, 'DeleteProduct']);

Route::get('/search/{query}', [ProductController::class, 'SearchProduct']);

