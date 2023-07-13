<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

// user related routes
Route::get('/', [UserController::class, "HomePage"])
    ->name('home.index');

Route::get('/login', [UserController::class, "LoginPage"])
    ->name('login.page');

Route::get('/register', [UserController::class, 'ViewRegister'])
    ->name('register.page');

Route::post('/registeruser', [UserController::class, 'RegisterUser'] )
    ->name('register.user');

Route::post('/loginuser', [UserController::class, 'LoginUser'] )
    ->name('login.user');

Route::get('/dashboard', [UserController::class, 'Dashboard'])
    ->name('dashboard.page');

Route::get('/logout', [UserController::class, 'Logout'])
    ->name('logout.user');


//Blog Post Routes
Route::get('/create-post', [PostController::class, 'showCreateForm'])
    ->name('post.show');

Route::post('/create-post', [PostController::class, 'storeNewPost'])
    ->name('post.store'); 

Route::get('/post/{post}', [PostController::class, 'viewSinglePost'])
    ->where(['post' => '[0-9]+'])
    ->name('single.post'); 