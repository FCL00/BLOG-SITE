@extends('layouts.base')


@section('title')
    <title>Blog | Create Post</title>
@endsection

@section('content')
    <main class="container mt-5 p-5 text-light">
       
        <section class="center-form">
            <form action="/post/{{$post->id}}" method="POST">
                @csrf
                {{-- PUT  design to understood that the user is trying to update something --}}
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title)}}">
                    @error('title')
                        <p class="text-danger">{{$message}}</p>   
                    @enderror
                </div>
                  <div class="mb-3">
                    <label for="body" class="form-label">Content</label>
                    <textarea class="form-control" id="body" name="body" rows="3" value="{{old('body', $post->body)}}"></textarea>
                    @error('body')
                        <p class="text-danger">{{$message}}</p>   
                    @enderror
                  </div>
                  <input class="btn btn-dark" type="submit" name="submit" id="submit" value="Save Changes">
            </form>
        </section>
    </main>
@endsection