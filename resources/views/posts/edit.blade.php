@extends('layouts/header')

@section('content')
    <h1> Create Post </h1> <hr />
    <form action="/post/{!! $post->id !!}" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title" class="font-weight-bold">Title: </label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Post Title" value="{!! $post->title !!}">
        </div>

        <div class="form-group">
            <label for="message" class="font-weight-bold">Body: </label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control post-message" placeholder="Post Message">{!! $post->message !!}</textarea>
        </div>

        <div class="form-group">
            <label for="cover_image" class="font-weight-bold">Image:</label>
            <input type="file" name="cover_image" id="cover_image">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <a href="/post/{!! $post->id !!}" class="btn btn-secondary float-right">GO BACK</a>
            <input type="submit" value="UPDATE" class="btn btn-primary float-right mr-2" onclick="return confirm('Are you sure you want to update this post?');">
        </div>


    </form>

@endsection
