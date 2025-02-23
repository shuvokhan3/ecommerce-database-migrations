<?php

use App\Http\Controllers\QueryController;
use App\Http\Controllers\modelController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products',[QueryController::class,'ProductController']);
Route::get('/singleProduct/{id}',[QueryController::class,'singleProduct']);
Route::get('/productPrice',[QueryController::class,'productPrice']);


Route::get('/calculatePrice',[QueryController::class,'calculatePrice']);

Route::get('/selectProduct',[QueryController::class, 'selectProduct']);
Route::get('/InnerJoin',[QueryController::class, 'innerJoin']);
Route::get('/LeftRightJoin',[QueryController::class, 'LeftRightJoin']);
Route::get('/crossjoin',[QueryController::class, 'crossjoin']);
Route::get('/advancedJoin',[QueryController::class, 'advancedJoin']);

Route::get('/unionQuery',[QueryController::class, 'unionQuery']);


//...................Model..................
Route::post('/create-brand',[modelController::class, 'createBrand']);














