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
//categorias
Route::get("categoria","App\Http\Controllers\CategoriesController@index");
Route::post("categoria","App\Http\Controllers\CategoriesController@store");
Route::get("categoria/{id}","App\Http\Controllers\CategoriesController@show");
Route::put("categoria/{id}","App\Http\Controllers\CategoriesController@update");
Route::delete("categoria/{id}","App\Http\Controllers\CategoriesController@destroy");
//details
Route::get("details","App\Http\Controllers\DetailsController@index");
Route::post("details","App\Http\Controllers\DetailsController@store");
Route::get("details/{id}","App\Http\Controllers\DetailsController@show");
Route::put("details/{id}","App\Http\Controllers\DetailsController@update");
Route::delete("details/{id}","App\Http\Controllers\DetailsController@destroy");
// imagenes
Route::get("images","App\Http\Controllers\ImagesController@index");
Route::post("images","App\Http\Controllers\ImagesController@store");
Route::get("images/{id}","App\Http\Controllers\ImagesController@show");
Route::put("images/{id}","App\Http\Controllers\ImagesController@update");
Route::delete("images/{id}","App\Http\Controllers\ImagesController@destroy");
// Productos
Route::get("products","App\Http\Controllers\ProductsController@index");
Route::post("products","App\Http\Controllers\ProductsController@store");
Route::get("products/{id}","App\Http\Controllers\ProductsController@show");
Route::put("products/{id}","App\Http\Controllers\ProductsController@update");
Route::delete("products/{id}","App\Http\Controllers\ProductsController@destroy");
// Rols
Route::get("rols","App\Http\Controllers\RolsController@index");
Route::post("rols","App\Http\Controllers\RolsController@store");
Route::get("rols/{id}","App\Http\Controllers\RolsController@show");
Route::put("rols/{id}","App\Http\Controllers\RolsController@update");
Route::delete("rols/{id}","App\Http\Controllers\RolsController@destroy");
// users
Route::get("users","App\Http\Controllers\UsersController@index");
Route::post("users","App\Http\Controllers\UsersController@store");
Route::get("users/{id}","App\Http\Controllers\UsersController@show");
Route::put("users/{id}","App\Http\Controllers\UsersController@update");
Route::delete("users/{id}","App\Http\Controllers\UsersController@destroy");
