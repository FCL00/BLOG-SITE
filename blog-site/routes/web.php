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
    ->middleware('guest')
    ->name('login.page');
    // ->name('login.page'); 

Route::get('/register', [UserController::class, 'ViewRegister'])
    ->middleware('guest')
    ->name('register.page');

Route::post('/registeruser', [UserController::class, 'RegisterUser'] )
    ->name('register.user');

Route::post('/loginuser', [UserController::class, 'LoginUser'] )
    ->middleware('guest')
    ->name('login.user');

Route::get('/dashboard', [UserController::class, 'Dashboard'])
    ->middleware('MustBeLoggedIn')
    ->name('dashboard.page');

Route::get('/logout', [UserController::class, 'Logout'])
    ->name('logout.user');


// Profile Routes
// specify which column where are going to access on the user model
// i am using type hinting on this route
Route::get('/profile/{user:username}', [UserController::class, 'ViewProfile'])
    ->middleware('MustBeLoggedIn')
    ->name('profile.page');

//Blog Post Routes
Route::get('/create-post', [PostController::class, 'showCreateForm'])
    ->middleware('MustBeLoggedIn')
    ->name('post.show');

Route::post('/create-post', [PostController::class, 'storeNewPost'])
    ->middleware('MustBeLoggedIn')    
    ->name('post.store'); 

Route::get('/post/{post}', [PostController::class, 'viewSinglePost'])
    ->middleware('MustBeLoggedIn')
    ->where(['post' => '[0-9]+'])
    ->name('single.post'); 

Route::delete('/post/{post}', [PostController::class, 'Delete']);


