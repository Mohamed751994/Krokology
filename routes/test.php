<?php

use App\Http\Controllers\Tests\TestTodoController;
use Illuminate\Support\Facades\Route;

Route::prefix('test')->group(function(){
    Route::post('todos/store', [TestTodoController::class, 'store']);
});
