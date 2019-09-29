@extends('layouts/header')

@section('content')

    <div class="row mt-0">
        <div class="col col-sm-12 pb-3">
            <a href="/post/{{$post->id}}/edit" class="btn btn-outline-primary font-weight-bold float-left mr-3">
                EDIT
            </a>
            <a href="/home" class="btn btn-outline-secondary font-weight-bold float-right">
                GO BACK
            </a>
        </div>
        <div class="col col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-center">
                        <h5 class="font-weight-bolder">
                            {{ $post->title }}
                        </h5>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col col-sm-6">
                            <img src="{!! $coverImage !!}" alt="Post image" width="100%" class=""> <br />
                        </div>

                        <div class="col col-sm-6">
                            <p>{!! $post->message !!}</p>
                            <smal> Written by: {!! $createdBy !!} </smal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
