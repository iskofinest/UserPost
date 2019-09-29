@extends('layouts/header')

@section('content')
    <h1> Create Post </h1> <hr />
    <form action="/post" method="POSt" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title" class="font-weight-bold">Title: </label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Post Title">
        </div>

        <div class="form-group">
            <label for="message" class="font-weight-bold">Body: </label>
            <textarea name="message" id="message" cols="30" rows="10" class="form-control post-message" placeholder="Post Message"></textarea>
        </div>

        <div class="form-group">
            <label for="cover_image" class="font-weight-bold">Image:</label>
            <input type="file" name="cover_image" id="cover_image">
            {{ csrf_field() }}
            <input type="submit" value="Save" class="btn btn-success float-right" onclick="return confirm('Are you sure you want to save this post?');">
        </div>


    </form>

@endsection
