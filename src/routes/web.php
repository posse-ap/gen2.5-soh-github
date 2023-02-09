<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizyController;
use App\Http\Controllers\Admin\AdminController;
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
    return view('quizy.quizytop');
});



Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index')->middleware(['auth', 'verified'])->name('admin');
    Route::get('/admin/questions/{id}', 'questions')->name('big_question.show');
    Route::get('/admin/big_questions/create', 'create')->name('big_question.create');
    Route::post('/admin/big_questions/store', 'store')->name('big_question.store');
    Route::get('/admin/big_questions/edit/{id}', 'edit')->name('big_question.edit');
    Route::post('/admin/big_questions/update/{id}', 'update')->name('big_question.update');
    Route::post('/admin/big_questions/destroy/{id}', 'destroy')->name('big_question.destroy');
});

Route::get('/quizy/{id}', [QuizyController::class,'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
