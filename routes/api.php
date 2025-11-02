<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LoanController;

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::apiResource('categories', CategoryController::class);
Route::apiResource('authors', AuthorController::class);
Route::apiResource('books', BookController::class);

Route::group(['middleware' => 'auth:api'], function() {
    Route::apiResource('loans', LoanController::class);
    Route::post('logout',[AuthController::class,'logout']);
    Route::get('me',[AuthController::class,'me']);
});
