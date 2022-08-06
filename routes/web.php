<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ScreaningController;
use GuzzleHttp\Middleware;

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
})->middleware('guest')->name('login');

Route::get('/login/admin', function () {
    return view('admin.adminLogin');
})->middleware('guest');

Route::post('/login/admin', [AdminController::class, 'login']);

Route::get('/login/user', function () {
    return view('user.userLogin');
})->middleware('guest');

Route::post('/login/user', [UserController::class, 'login']);
Route::post('/register/user', [UserController::class, 'toRegister']);
Route::post('/register/user/form', [UserController::class, 'Register']);

Route::post('/logout', [UserController::class, 'logout']);
Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth');
Route::get('/form', [UserController::class, 'form'])->middleware('auth');
Route::post('/form', [ScreaningController::class, 'store']);
Route::get('/form/show/{screaning:id}', [ScreaningController::class, 'show'])->middleware('auth');
Route::get('/profile', [UserController::class, 'show'])->middleware('auth');
Route::get('/profile/update', [UserController::class, 'edit'])->middleware('auth');
Route::post('/profile/update', [UserController::class, 'update']);
Route::get('/profile/delete/{user:nik}', [UserController::class, 'destroy'])->middleware('auth');
Route::get('/edit/{user:nik}', [UserController::class, 'edit'])->middleware('auth');
Route::post('/edit/{user:nik}', [UserController::class, 'updateAdmin'])->middleware('auth');

Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->middleware('auth');
