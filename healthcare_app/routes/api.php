<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DocsController;
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

//this is endpoint of prefix api
Route::post('/login', [UsersController::class, 'login']);
Route::post('/register', [UsersController::class, 'register']);

//this group mean return user's data if authenticated successfully
Route::middleware('auth:sanctum')->group(function(){
 Route::get('/user', [UsersController::class, 'index']);
 Route::post('/book', [AppointmentsController::class, 'store']);
 Route::get('/appointments', [AppointmentsController::class, 'index']); //retrieve appointments
});