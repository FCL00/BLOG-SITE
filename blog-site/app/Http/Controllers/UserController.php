<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function HomePage()
    {
        // check if the user is login or not
        if( auth()->check()){
            return view('dashboard');
        } 
        else{
            return view('home');
        }
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
            'username' => ['required', 'min:3', 'max:25', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $user = User::create($incomingField);
        auth()->login($user);
        return redirect()->route('home.index')->with('success', 'New account is successfully created');
    }
    
    public function Dashboard()
    {
        // check if the user is login or not
        if( auth()->check()){
            return view('dashboard');
        } 
        else{
            return redirect()->route('login.page');
        }
      
    }
   
    public function LoginUser(Request $request)
    {
        $incomingField = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt(['username' => $incomingField['username'], 'password' => $incomingField['password']]))
        {
            // generate session 
            $request->session()->regenerate();
            return redirect()->route('dashboard.page');
        }else{
            return redirect()->route('login.page')->with('error', 'Incorrect Username or Password');
        }
    }

    public function Logout()
    {
        auth()->logout();
        return redirect()->route('dashboard.page');
    }
}
