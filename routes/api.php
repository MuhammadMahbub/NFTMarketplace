<?php

use App\Http\Controllers\BlogApiController;
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

Route::get('/blogs', [BlogApiController::class, 'index']);

Route::get('/blogs/{id}', [BlogApiController::class, 'show']);

Route::get('/blogs/{id}/update', [BlogApiController::class, 'update']);

Route::post('/blogs/create', [BlogApiController::class, 'create']);

Route::delete('/blogs/delete/{id}', [BlogApiController::class, 'destroy']);


Route::get('/allBlogPost', [BlogApiController::class, 'index']);
Route::get('/allBlogPost/show/{id}', [BlogApiController::class, 'show']);
Route::post('/allBlogPost/create', [BlogApiController::class, 'create']);
Route::get('/allBlogPost/update/{id}', [BlogApiController::class, 'update']);
Route::delete('/allBlogPost/delete/{id}', [BlogApiController::class, 'destroy']);

