<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function ViewRegister()
    {
        return view('register');
    }
    
    public function RegisterUser(Request $request)
    {
        $incomingField = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create($incomingField);
        return "<h1>New User is added</h1>";
    }

   
}
