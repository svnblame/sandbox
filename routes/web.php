<?php

use App\Http\Controllers\AdvancedFeaturesController;
use App\Http\Controllers\DependencyInjectionController;
use App\Http\Controllers\GeneratingObjectsController;
use App\Http\Controllers\HandlingErrorsController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ObjectBasicsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WelcomeController;
use App\Models\Greeting;
use Illuminate\Support\Facades\Route;

// POPP

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/object-basics', [ObjectBasicsController::class, 'index'])
    ->name('object-basics');
Route::get('/advanced-features', [AdvancedFeaturesController::class, 'index'])
    ->name('advanced-features');
Route::get('/handling-errors', [HandlingErrorsController::class, 'index'])
    ->name('handling-errors');
Route::get('/generating-objects', [GeneratingObjectsController::class, 'index'])
    ->name('generating-objects');
Route::get('/dependency-injection', [DependencyInjectionController::class, 'index'])
    ->name('di');

// LUR

Route::get('/hello', [WelcomeController::class, 'index']);
Route::get('create-greeting', function () {
    $greeting = new Greeting();
    $greeting->body = 'Hello, from the database!';
    $greeting->save();
});

Route::get('greeting', function () {
    return Greeting::first()->body;
});
Route::get('members/{id}', [MemberController::class, 'show'])->name('members.show');
Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
