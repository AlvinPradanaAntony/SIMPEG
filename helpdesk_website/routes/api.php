<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\TicketController;
use App\Http\Middleware\CustomAuthError;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum']], function () {
  Route::get('/tickets', [TicketController::class, 'index']);
  Route::get('/tickets/{id}', [TicketController::class, 'show']);
  Route::post('/tickets', [TicketController::class, 'store']);
  Route::patch('/tickets/{id}', [TicketController::class, 'update'])->middleware('my-tickets');
  Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->middleware('my-tickets');
  Route::post('/comment', [CommentsController::class, 'store']);
  Route::patch('/comment/{id}', [CommentsController::class, 'update'])->middleware('my-comments');
  Route::delete('/comment/{id}', [CommentsController::class, 'destroy'])->middleware('my-comments');
  Route::get('/logout', [AuthController::class, 'logout']);
});

Route::post('/login', [AuthController::class, 'login'] );
Route::post('/register', [AuthController::class, 'register']);

Route::get('/faq',[FaqController::class, 'index']);
Route::get('/faq/{id}',[FaqController::class, 'edit']);
