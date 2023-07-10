<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, "HomePage"])
    ->name('home.index');

Route::get('/login', [UserController::class, "LoginPage"])
    ->name('login.page');

    
Route::get('/register', [UserController::class, 'ViewRegister'])
    ->name('register.page');

Route::post('/registeruser', [UserController::class, 'RegisterUser'] )
    ->name('register.user');
