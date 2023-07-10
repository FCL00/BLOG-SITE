<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function HomePage()
    {
        return view('home');
    }

    public function LoginPage()
    {
        return view('login');
    }

    public function Register()
    {
        return view('register');
    }
}
