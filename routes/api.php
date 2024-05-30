<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    
        Route::get('users', [AuthController::class, 'getUsers']);
        Route::post('users/tasks', [TaskController::class, 'getUserTasks']);
    

    Route::resource('tasks', TaskController::class)->except(['create', 'edit']);
});
