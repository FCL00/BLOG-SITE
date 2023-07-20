@extends('layouts.base')

@section('title')
    <title>Profile</title>
@endsection

@section('content')
    <main class="container mt-5 p-3 text-light">
        <section class="profile-name">
            <img class="avatar-img me-1" src="/images/avatar.jpg" alt="avatar"  style='width: 35.82px; height: 37.33px;'>
            <small>{{ $username }}</small>
            <button class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Follow User" >
                <i class="fa-solid fa-user-plus"></i> 
            </button>
            <hr>
        </section>

        <section class="profile-links">
            <div class="row">
                <div class="col-1"><h5>Post: {{ $postCount }}</h5></div>
                <div class="col-2"><h5><a href="">Followers: </a></h5></div>
                <div class="col-2"><h5><a href="">Following: </a></h5></div>
            </div>
            <hr>
        </section>

        @foreach ($posts as $post)
            <section class="post-list rounded mb-3 p-2">
                    <img class="avatar-img me-1" src="/images/avatar.jpg" alt="avatar"  style='width: 35.82px; height: 37.33px;'>
                    <a href="/post/{{ $post->id }}">
                        <strong>{{ $post->title }}
                            <span class="text-muted"> on {{ $post->created_at->format('n/j/Y') }}</span>
                        </strong>
                    </a>
                    <br>
            </section>
        @endforeach

    </main>
@endsection