@extends('layouts/header')

@section('content')
<div class="row">
    <div class="col-sm-4 offset-sm-4">

        <div class="card card-login mx-auto text-center bg-light">
            <div class="card-header mx-auto bg-light">
                <h4 class="card-title mt-2"> Login Dashboard </h4>

            </div>
            <div class="card-body">
                <form action="/login" method="post">
                    {{ csrf_field() }}
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                        </div>
                        <input type="text" name="username" class="form-control" placeholder="Username" maxlength="20 " required>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="btn" value="Login" class="btn btn-block btn-outline-primary float-center font-weight-bold">
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection
