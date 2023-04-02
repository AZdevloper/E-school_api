<?php

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(App\Http\Controllers\TeacherController::class)->group(function () {
    Route::get('teachers', 'index')->middleware(['auth:sanctum']);
    Route::get('teachers/{id}', 'show');
    Route::post('teachers', 'store');
    Route::put('teachers/{id}', 'update');
    Route::delete('teachers/{id}', 'destroy');
    // Route::get('teacher/category/{id}', 'filter')->middleware(['auth:sanctum', 'permission:filter teachers']);
})->middleware(['auth:sanctum', 'role:admin']);;
