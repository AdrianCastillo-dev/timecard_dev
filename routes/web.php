<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Users routes 
Route::get('/data',[App\Http\Controllers\DataController::class, 'index']);
Route::post('/data/submit',[App\Http\Controllers\DataController::class, 'submit']);


//Validator ruotes
Route::get('/validator',[App\Http\Controllers\ValidatorController::class, 'index']);
Route::get('/validator/{id}',[App\Http\Controllers\ValidatorController::class, 'user']);

Route::get('/validator/validated/{id}',[App\Http\Controllers\ValidatorController::class, 'validated']);

Route::get('/validator/drop/{id}',[App\Http\Controllers\ValidatorController::class, 'drop']);

//Manager routes
Route::get('/manager',[App\Http\Controllers\ManagerController::class, 'index']);
Route::get('/manager/activity',[App\Http\Controllers\ManagerController::class, 'activity']);
Route::get('/manager/activity/drop/{type}/{id}',[App\Http\Controllers\ManagerController::class, 'drop']);

Route::post('/manager/submit/direct',[App\Http\Controllers\ManagerController::class, 'submit_direct']);
Route::post('/manager/submit/indirect',[App\Http\Controllers\ManagerController::class, 'submit_indirect']);

Route::get('/manager/aps',[App\Http\Controllers\ManagerController::class, 'aps']);

Route::get('/manager/users',[App\Http\Controllers\ManagerController::class, 'users']);

Route::post('/manager/aps/submit',[App\Http\Controllers\ManagerController::class, 'submit_aps']);

Route::get('/manager/aps/drop/{id}',[App\Http\Controllers\ManagerController::class, 'drop_aps']);

Route::get('/manager/users/{id}/{type}',[App\Http\Controllers\ManagerController::class, 'users_add']);


Route::get('/manager/analysis',[App\Http\Controllers\ManagerController::class, 'analysis']);

Route::get('/manager/analysis/{id}',[App\Http\Controllers\ManagerController::class, 'act_user']);




