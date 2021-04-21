<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

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

Route::get('/', [TasksController::Class, 'showTask'])->name('mostrarTask');

Route::get('/tarefas', [TasksController::Class, 'loadPage'])->name('loadPage');

Route::post('/CriarTarefa', [TasksController::Class, 'addTask'])->name('guardarTask');

Route::get('/EliminarTarefa/{task}', [TasksController::Class, 'removeTask'])->name('deleteTask');
