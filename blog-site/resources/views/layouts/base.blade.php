<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    @yield('title')
</head>
<body>
    <!--nav bar-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark px-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><i class="fa-solid fa-user-secret me-2"></i>Blog Site</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">  
                    @auth
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link"  href="/"><i class="fa-solid fa-magnifying-glass me-1"></i>Search</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="/"><i class="fa-regular fa-message me-1"></i>Messages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="/"><i class="fa-regular fa-user me-1"></i>Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="/create-post"><i class="fa-regular fa-square-plus me-1"></i>Create Post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="/logout"><i class="fa-solid fa-arrow-right-from-bracket me-1"></i>Logout</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link"  href="/login"><i class="fa-solid fa-user me-1"></i>Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register"><i class="fa-sharp fa-solid fa-right-from-bracket me-1"></i>Register</a>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>
        </nav>
    </header>
    <!--nav bar-->

    <section class="flash-message container mt-5 center-form">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    </section>

    @yield('content')

    <footer class="text-center text-muted small mt-5">
        <p class="text-light">Copyright &copy; {{date('Y')}} Blog Site. All rights reserved.</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/874ad22535.js" crossorigin="anonymous"></script>
</body>
</html>