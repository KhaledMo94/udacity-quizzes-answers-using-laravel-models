<?php

use App\Http\Controllers\AnswersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/answer',[AnswersController::class,'index']);