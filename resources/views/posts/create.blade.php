@extends('layouts.app')
@section('title' , 'create')
@section('content')
    <h1>Add new post</h1>
    <form action="{{ route('posts.store') }}" style="width: 50%" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">title</span>
            <input type="text" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">description</span>
            <input type="text" name="description" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div>
            <input name="image" class="form-control form-control-lg" id="formFileLg" type="file">
        </div>
        <button type="submit" class="btn btn-warning">send</button>
    </form>
@endsection
