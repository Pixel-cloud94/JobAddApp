<?php
use App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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



Route::get('/login', [AuthController::class, 'login'])-> name ('login');
Route::post('/login', [AuthController::class, 'loginPost'])-> name ('login.post');
Route::get('/register', [AuthController::class, 'register'])-> name ('register');
Route::post('/register',[AuthController::class, 'registerPost' ])-> name('register.post');
Route::get('/adminboard', [AdminController::class, 'index'])->name('adminboard');
Route::get('/userboard', [UserController::class, 'index'])->name('userboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::delete('/jobs/deleteSelectedJob', [AdminController::class, 'deleteSelectedJob'])->name('jobs.deleteSelectedJob');
Route::post('/addjobs', [AdminController::class, 'addjobsPost'])->name('addjobs.post');
Route::match(['post', 'put'], '/updatejobs', [AdminController::class, 'updatejobs'])->name('updatejobs.post');

Route::delete('/users/deleteSelectedUser', [AdminController::class, 'deleteSelectedUser'])->name('users.deleteSelectedUser');
Route::post('/users/{user}/upload-image', [UserController::class, 'uploadImage'])->name('users.uploadImage');
Route::match(['post', 'put'], '/updateusersPost', [AdminController::class, 'updateusersPost'])->name('updateusersPost.post');










