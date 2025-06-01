<?php

use App\Http\Controllers\AdvancedFeaturesController;
use App\Http\Controllers\ObjectBasicsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/object-basics', [ObjectBasicsController::class, 'index']);
Route::get('/advanced-features', [AdvancedFeaturesController::class, 'index']);
