<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['auth']], function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'index'])->name('calendar.index');

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('positions', App\Http\Controllers\PositionController::class);
    Route::resource('projects', App\Http\Controllers\ProjectController::class);

    Route::get('/boards/{id}',  [App\Http\Controllers\BoardController::class, 'boards'])->name('boards.get');
    Route::post('/boards/{id}/sort',  [App\Http\Controllers\BoardController::class, 'sort'])->name('boards.sort');
    Route::post('/boards/{id}',  [App\Http\Controllers\BoardController::class, 'store'])->name('boards.store');
    Route::post('/boards/{id}/update',  [App\Http\Controllers\BoardController::class, 'update'])->name('boards.update');
    Route::post('/boards/{id}/destroy',  [App\Http\Controllers\BoardController::class, 'destroy'])->name('boards.destroy');

    Route::post('/tasks/{id}/sort',  [App\Http\Controllers\TaskController::class, 'sort'])->name('tasks.sort');
    Route::post('/tasks',  [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');

});


