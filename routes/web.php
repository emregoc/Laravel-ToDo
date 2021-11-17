<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TodoController;
use App\Models\Todo;
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

Route::get('/', function () {
    return redirect('/register');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::get('/todo', [TodoController::class, 'show'])->name('show.todo')->middleware('auth');
Route::get('/update-todo/{id}', [TodoController::class, 'edit'])->name('update.todo')->middleware('auth');
Route::post('/edit-todo', [TodoController::class, 'update'])->name('edit.todo')->middleware('auth');
Route::get('/delete-todo/{id}', [TodoController::class, 'destroy'])->name('delete.todo')->middleware('auth');
Route::get('/status-todo/{id}', [TodoController::class, 'statusComplete'])->name('status.todo')->middleware('auth');
Route::get('/status-active-todo/{id}', [TodoController::class, 'statusActive'])->name('status.todo.active')->middleware('auth');

Route::get('/active', [TodoController::class, 'activeShowTodo'])->middleware('auth');
Route::get('/all', [TodoController::class, 'allShowTodo'])->middleware('auth');
Route::get('/completed', [TodoController::class, 'showComplete'])->middleware('auth');

Route::post('/add-todo', [TodoController::class, 'store'])->name('save.todo')->middleware('auth');

Route::post('/search', [TodoController::class, 'search'])->name('search.todo')->middleware('auth');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth','is_admin');
Route::post('/user-todo', [AdminController::class, 'userTodo'])->name('user.todo')->middleware('auth','is_admin');
