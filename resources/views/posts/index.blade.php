@extends('layouts/header')

@section('content')



    <div class="container">

        <div class="h1">
            Posts
            <a href="/post/create" class="btn btn-primary float-right">Create Post</a>
        </div>

        @if(count($posts) > 0)
            @foreach($posts as $post)
                <hr />
                <div class="card card-body bg-light">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="/storage/cover_images/{!! $post->cover_image !!}" alt="Post image" width="100%" class=""> <br />
                        </div>
                        <div class="col-sm-8">
                            <h3><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h3>
                            <p>{{ $post->message }}</p>
                            <small>written at {{ $post->created_at }} <br /> by {{ $post->user->first_name." ".substr($post->user->middle_name, 0, 1).". ".$post->user->last_name }}</small>
                            <small>Last Updated at {{ $post->created_at }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
                {{ $posts->links() }}
        @endif

    </div>
@endsection
