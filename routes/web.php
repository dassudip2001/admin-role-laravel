<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
   return view('admin.index');
})->middleware(['auth','role:admin'])->name('admin.index');
require __DIR__.'/auth.php';
//
//Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('permission:write post');
//Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('role:editor|admin');


Route::get('/student',[StudentController::class,'index'])->name('index');
Route::post('/student',[StudentController::class,'create'])->name('create');
Route::get('/student/edit/{id}',[StudentController::class,'edit'])->name('edit');
Route::put('/student/edit/{id}',[StudentController::class,'update'])->name('update');
Route::get('/student/delete/{id}',[StudentController::class,'destroy'])->name('destroy');