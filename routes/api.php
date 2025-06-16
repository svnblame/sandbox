<?php

use App\Http\Controllers\Api\DogController;
use App\Models\Dog;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Api')->group(function () {
    Route::get('dogs', [DogController::class, 'index']);
});
