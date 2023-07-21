@extends('layouts.base')


@section('title')
    <title>Blog | Create Post</title>
@endsection

@section('content')
    <main class="container mt-5 p-2 text-light">
        <section class="p-3 rounded ">
            <div class="row">
                <div class="col-10">
                    <h1>{{ $post->title }}</h1>
                    <small class="text-muted">Posted by &nbsp;<a href="#"><img class="avatar-img me-1" src="/images/avatar.jpg" alt="avatar">{{ $post->user->username }}</a>&nbsp; on {{ $post->created_at->format('m/j/Y') }}</small>
                </div>
                <div class="col-2">
                    @can('update', $post)
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-outline-warning me-1 shadow-none"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="/post/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-outline-danger me-1  shadow-none"> 
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                            {{-- <a href="#" class="btn btn-outline-primary  shadow-none"><i class="fa-solid fa-box-archive"></i></a> --}}
                        </div>
                    @endcan
                </div>
            </div>
            <hr>
            <div class="post-content">
                <p>{!! $post->body !!}</p>
            </div>  
        </section>
    </main>
@endsection

