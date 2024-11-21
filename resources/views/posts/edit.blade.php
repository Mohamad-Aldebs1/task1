@extends('layouts.app')
@section('title' , 'create')
@section('content')
    <h1>update post</h1>
    <form action="{{ route('posts.update',$post->id) }}" style="width: 50%" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">title</span>
            <input type="text" name="title" class="form-control" value="{{$post->title}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">description</span>
            <input type="text" name="description" value="{{$post->description}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div>
            <input name="image" value="{{$post->image}}" class="form-control form-control-lg" id="formFileLg" type="file">
        </div>
        <button type="submit" class="btn btn-warning">send</button>
    </form>
@endsection
