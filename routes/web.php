<?php

use App\Http\Controllers\DemoController;
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

Route::get('/products',[DemoController::class,'ProductController']);
Route::get('/singleProduct/{id}',[DemoController::class,'singleProduct']);
Route::get('/productPrice',[DemoController::class,'productPrice']);


Route::get('/calculatePrice',[DemoController::class,'calculatePrice']);

Route::get('/selectProduct',[DemoController::class, 'selectProduct']);
Route::get('/InnerJoin',[DemoController::class, 'innerJoin']);
Route::get('/LeftRightJoin',[DemoController::class, 'LeftRightJoin']);
Route::get('/crossjoin',[DemoController::class, 'crossjoin']);
Route::get('/advancedJoin',[DemoController::class, 'advancedJoin']);

Route::get('/unionQuery',[DemoController::class, 'unionQuery']);


//...................Model..................
Route::post('/create-brand',[modelController::class, 'createBrand']);














