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

// // middleware('auth:sanctum')->
// Route::get('/users', function (Request $request) {
//     $users = app\Http 
//     return response()->json([
//         'id' => $request->id,
//         'name' => 'John Doe',
                
//         ]
//     );
// });


Route::controller(App\Http\Controllers\TeacherController::class)->group(function () {
    Route::get('teachers', 'index');
    // Route::get('books/{id}', 'show')->middleware(['auth:sanctum','permission:list books']);
    // Route::post('book', 'store')->middleware(['auth:sanctum','permission:add book']);
    // Route::put('books/{id}', 'update')->middleware(['auth:sanctum','permission:edite book']);
    // Route::delete('book/{id}', 'delete')->middleware(['auth:sanctum','permission:delete book']);
    // Route::get('book/category/{id}', 'filter')->middleware(['auth:sanctum','permission:filter books']);
});