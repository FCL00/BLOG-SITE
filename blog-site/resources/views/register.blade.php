@extends('layouts.base')

@section('title')
    <title>Login</title>
@endsection

@section('content')
    <main class="center-form container mt-5 px-5 text-light">
        <section class="register-form">
            <form action="/registeruser" method="POST">
                @csrf
                <h1>Register </h1>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingUsernameInput" name="username" value="{{old('username')}}">
                    <label class="text-dark" for="floatingUsernameInput">Username</label>
                    @error('username')
                        <p class="text-danger">{{$message}}</p>   
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInputEmail" name="email" value="{{old('email')}}">
                    <label class="text-dark" for="floatingInputEmail">Email address</label>
                    @error('email')
                        <p class="text-danger">{{$message}}</p>   
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Enter Your Password">
                    <label class="text-dark" for="floatingPassword">Password</label>
                    @error('password')
                        <p class="text-danger">{{$message}}</p>   
                    @enderror
                </div>
                <div class="form-floating mb-1">
                    <input type="password" class="form-control" id="floatingRetypePassword" name="password_confirmation" placeholder="Enter Your Password">
                    <label class="text-dark" for="floatingRetypePassword">Retype Password</label>
                    @error('password_confirmation')
                        <p class="text-danger">{{$message}}</p>   
                    @enderror
                </div>
                <a href="/login">Already have an account?</a>
                <div class="mt-1">
                    <input class="btn bg-dark text-light shadow-none" type="submit" value="Register" style="width: 100%;" >
                </div>
            </form>
        </section>
    </main>
@endsection