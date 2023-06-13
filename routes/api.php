<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::resource('category',\App\Http\Controllers\CategoryController::class);
Route::resource('brand',\App\Http\Controllers\BrandController::class);
Route::resource('appointment',\App\Http\Controllers\AppointmentController::class);
Route::resource('dress',\App\Http\Controllers\DressController::class);
Route::resource('scenery',\App\Http\Controllers\SceneryController::class);
Route::resource('package',\App\Http\Controllers\PackageController::class);
Route::resource('photo_collection',\App\Http\Controllers\PhotoCollectionController::class);
Route::resource('customer',\App\Http\Controllers\CustomerController::class);
Route::post('register', [\App\Http\Controllers\AuthController::class,'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class,'login']);
Route::post('appointment/confirm/{id}',[AdminController::class,'updateStatusAppointment']);
Route::post('appointment/cancel/{id}',[AdminController::class,'cancelAppointment']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
