<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\StudentController;

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


Route::get('/',[StudentController::class,'index']);

Route::post('/store',[StudentController::class,'store'])->name('student.store');
Route::view('/form','form.add_student')->name('student.form');
Route::post('/delete',[StudentController::class,'destroy'])->name('student.delete');


Route::get('edit/{id}',[StudentController::class,'edit'])->name('student.edit');

Route::post('update/{id}',[StudentController::class,'update'])->name('student.update');
