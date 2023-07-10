@extends('layouts.base')

@section('title')
    <title>Home Page</title>
@endsection

@section('content')
    <main class="center-form container mt-5 px-5 text-light">
        <section class="login-form">
            <form action="">
                @csrf
                <h1>Login </h1>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="username">
                    <label class="text-dark" for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-1">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label class="text-dark" for="floatingPassword">Password</label>
                </div>
                    <a href="/register">Create an Account?</a>
                <div class="mt-1">
                    <input class="btn bg-dark text-light shadow-none" type="submit" value="Login" style="width: 100%;" >
                </div>
            </form>
        </section>
    </main>
@endsection