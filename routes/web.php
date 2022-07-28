<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScreaningController;

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
    return view('index');
});

Route::get('/login/admin', function () {
    return view('admin.adminLogin');
});

Route::post('/login/admin', [AdminController::class, 'login']);

Route::get('/login/user', function () {
    return view('user.userLogin');
});

Route::post('/login/user', [UserController::class, 'login']);
Route::post('/logout/user', [UserController::class, 'logout']);
Route::post('/register/user', [UserController::class, 'toRegister']);
Route::post('/register/user/form', [UserController::class, 'Register']);

Route::get('/user/dashboard', [UserController::class, 'index']);
Route::get('/user/form', [UserController::class, 'form']);
Route::post('/user/form', [ScreaningController::class, 'store']);
Route::get('/user/form/show', [ScreaningController::class, 'show']);
Route::get('/user/profile', [UserController::class, 'show']);
Route::get('/user/update', [UserController::class, 'edit']);
Route::post('/user/update', [UserController::class, 'update']);
