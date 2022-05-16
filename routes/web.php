<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);  

});
Route::get('/home', [App\Http\Controllers\TodoController::class, 'index'])->name('home');
Route::post('/add', [App\Http\Controllers\TodoController::class, 'add'])->name('add');
Route::post('/update/{id}', [App\Http\Controllers\TodoController::class, 'update'])->name('update');
Route::get('/delete/{id}', [App\Http\Controllers\TodoController::class, 'delete'])->name('delete');
Route::get('/done/{id}', [App\Http\Controllers\TodoController::class, 'done'])->name('done');