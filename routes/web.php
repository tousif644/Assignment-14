<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

//Answer 1 & 2:
Route::post('/name', [DemoController::class, 'getName']);

//Answer 5:
Route::post('/upload', [DemoController::class, 'upload']);

//Answer 6:
Route::get('/cookie', [DemoController::class, 'getCookie']);

//Answer 6:
Route::post('/submit', [DemoController::class, 'submit']);