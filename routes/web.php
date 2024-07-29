<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'actionRegister'])->name('actionRegister');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/detail/student/{id}', [StudentController::class, 'show'])->name('detailStudent');

    Route::middleware('CheckRole:ADMIN')->group(function () {

        Route::prefix('create')->group(function () {
            Route::get('/student', [StudentController::class, 'create'])->name('addStudent');
            Route::post('/student', [StudentController::class, 'store'])->name('addStudent');
            Route::get('/classroom', [ClassroomController::class, 'create'])->name('addClassroom');
            Route::post('/classroom', [ClassroomController::class, 'store'])->name('addClassroom');
            Route::get('/subject', [SubjectController::class, 'create'])->name('addSubject');
            Route::post('/subject', [SubjectController::class, 'store'])->name('addSubject');
        });
        Route::prefix('edit')->group(function () {
            Route::get('/student/{id}', [StudentController::class, 'edit'])->name('editStudent');
            Route::put('/student/{id}', [StudentController::class, 'update'])->name('editStudent');
            Route::get('/classroom/{id}', [ClassroomController::class, 'edit'])->name('editClassroom');
            Route::put('/classroom/{id}', [ClassroomController::class, 'update'])->name('editClassroom');
        });
        Route::prefix('delete')->group(function () {
            Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('deleteStudent');
            Route::delete('/classroom/{id}', [ClassroomController::class, 'destroy'])->name('deleteClassroom');
        });
    });
});
