<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\jobController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PaymentTypeController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\WorkerController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('user', [AuthController::class, 'me']);
Route::middleware('auth:api')->post('logout', [AuthController::class, 'logout']);
Route::post('', [AuthController::class, 'login']);
Route::get('/clients',[ClientController::class,'index']);
Route::get('/clients/{id}',[ClientController::class,'show']);
Route::post('/client',[ClientController::class,'store']);

Route::post('/client/{id}',[ClientController::class,'update']);
Route::post('/clients/{id}',[ClientController::class,'destroy']);


Route::get('/workers',[WorkerController::class,'index']);
Route::get('/workers/{id}',[WorkerController::class,'show']);
Route::post('/worker',[WorkerController::class,'store']);

Route::post('/worker/{id}',[WorkerController::class,'update']);
Route::post('/workers/{id}',[WorkerController::class,'destroy']);


Route::get('/payments',[PaymentController::class,'index']);
Route::get('/payments/{id}',[PaymentController::class,'show']);
Route::post('/payment',[PaymentController::class,'store']);

Route::post('/payment/{id}',[PaymentController::class,'update']);
Route::post('/payments/{id}',[PaymentController::class,'destroy']);

Route::get('/payments_type',[PaymentTypeController::class,'index']);

Route::get('/payments_type/{id}',[PaymentTypeController::class,'show']);
Route::post('/payment_type',[PaymentTypeController::class,'store']);

Route::post('/payment_type/{id}',[PaymentTypeController::class,'update']);
Route::post('/payments_type/{id}',[PaymentTypeController::class,'destroy']);


Route::get('/job',[jobController::class,'index']);
Route::get('/jobs/{id}',[jobController::class,'show']);
Route::post('/job',[jobController::class,'store']);

Route::post('/job/{id}',[jobController::class,'update']);
Route::post('/job/{id}',[jobController::class,'destroy']);


Route::get('/review',[ReviewController::class,'index']);
Route::get('/reviews/{id}',[ReviewController::class,'show']);
Route::post('/review',[ReviewController::class,'store']);
Route::post('/review/{id}',[ReviewController::class,'update']);
Route::post('review/{id}',[ReviewController::class,'destroy']);


Route::get('/review',[ChatController::class,'index']);
Route::get('/reviews/{id}',[ChatController::class,'show']);
Route::post('/review',[ChatController::class,'store']);
Route::post('/review/{id}',[ChatController::class,'update']);
Route::post('review/{id}',[ChatController::class,'destroy']);
