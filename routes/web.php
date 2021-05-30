<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dealController;

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

Route::get('/', [dealController::class, 'index']);
Route::post('/createDeal', [dealController::class, 'create']);
Route::get('/createDealForm', [dealController::class, 'show']);
Route::get('/task-create/{id}', [dealController::class, 'showTask']);
Route::post('/createtask', [dealController::class, 'createTask']);


