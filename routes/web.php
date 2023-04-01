<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherAuthController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminTrainingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/training-category', [HomeController::class, 'traningCategory'])->name('training-category');
Route::get('/all-training', [HomeController::class, 'allTraining'])->name('all-training');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/login-register', [HomeController::class, 'auth'])->name('login-registration');
Route::get('/teacher/login', [TeacherAuthController::class, 'index'])->name('teacher.login');
Route::post('/teacher/login', [TeacherAuthController::class, 'login'])->name('teacher.login');

Route::middleware(['teacher.auth'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherAuthController::class, 'dashboard'])->name('teacher.dashboard');
    Route::post('/teacher/logout', [TeacherAuthController::class, 'logout'])->name('teacher.logout');
    Route::get('/training/add', [TrainingController::class, 'index'])->name('training.add');
    Route::post('/training/create', [TrainingController::class, 'create'])->name('training.create');
    Route::get('/training/manage', [TrainingController::class, 'manage'])->name('training.manage');
    Route::get('/training/search', [TrainingController::class, 'error'])->name('training.search');
    Route::post('/training/search', [TrainingController::class, 'search'])->name('training.search');
    Route::get('/training/detail/{id}', [TrainingController::class, 'detail'])->name('training.detail');
    Route::get('/training/edit/{id}', [TrainingController::class, 'edit'])->name('training.edit');
    Route::post('/training/update/{id}', [TrainingController::class, 'update'])->name('training.update');
    Route::post('/training/delete/{id}', [TrainingController::class, 'delete'])->name('training.delete');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/teacher/add', [TeacherController::class, 'index'])->name('teacher.add');
    Route::post('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::get('/teacher/manage', [TeacherController::class, 'manage'])->name('teacher.manage');
    Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::post('/teacher/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
    Route::get('/teacher/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/teacher/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/teacher/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/teacher/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/teacher/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/teacher/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/admin/training/manage', [AdminTrainingController::class, 'index'])->name('admin.training.manage');
    Route::get('/admin/training/detail/{id}', [AdminTrainingController::class, 'show'])->name('admin.training.detail');
    Route::get('/admin/training/update/status/{id}', [AdminTrainingController::class, 'status'])->name('admin.training.update.status');
});

