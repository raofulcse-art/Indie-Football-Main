<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/
Route::resource('users',UserController::class);

Route::get('/teamlist',[TeamController::class,'index']);