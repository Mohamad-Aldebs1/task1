@extends('layouts.app')
@section('title' , 'Posts')
@section('content')
    <button type="button" class="btn btn-primary"><a class="text-white link-offset-2 link-underline link-underline-opacity-0" href="{{ route('posts.create') }}">add post</a></button>
    <hr>
    <div class="d-flex flex-column align-items-center flex-wrap  ">
    @forelse ( $posts as $post )
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img width="300px" height="100px" src="/images/posts/{{ $post->image }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->description}}</p>
                    </div>
                    <div class="card-body d-flex justify-content-around">
                        <button type="button" class="btn btn-warning"><a href="{{route('posts.edit', $post->id)}}" class="text-white link-offset-2 link-underline link-underline-opacity-0">update</a></button>
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>no posts yet</p>
    @endforelse
    </div>
@endsection
