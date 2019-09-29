@extends('layouts/header')

@section('content')
    <div class="card">

        <form class="card-body" method="POST" action="/user">
            <div class="card-title">
                <h4 class="card-title">Register User</h4> <hr />
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group form-group form-row">
                        <label for="firstname" class="col col-sm-3 col-form-label font-weight-bold text-right">First Name:</label>
                        <div class="col col-sm-9">
                            <input type="text" name="firstname" id="firstname"
                                   class="form-control" placeholder="First Name Here"
                            >
                        </div>
                    </div>

                    <div class="input-group form-group form-row">
                        <label for="middlename" class="col col-sm-3 col-form-label font-weight-bold text-right">Middle Name:</label>
                        <div class="col col-sm-9">
                            <input type="text" name="middlename" id="middlename"
                                   class="form-control" placeholder="Middle Name Here"
                            >
                        </div>
                    </div>

                    <div class="input-group form-group form-row">
                        <label for="lastname" class="col col-sm-3 col-form-label font-weight-bold text-right">Last Name:</label>
                        <div class="col col-sm-9">
                            <input type="text" name="lastname" id="lastname"
                                   class="form-control" placeholder="Last Name Here"
                            >
                        </div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="input-group form-group form-row">
                        <label for="email" class="col col-sm-3 col-form-label font-weight-bold text-right">Email:</label>
                        <div class="col col-sm-9">
                            <input type="text" name="email" id="email"
                                   class="form-control" placeholder="Email Here"
                            >
                        </div>
                    </div>

                    <div class="input-group form-group form-row">
                        <label for="username" class="col col-sm-3 col-form-label font-weight-bold text-right">Username:</label>
                        <div class="col col-sm-9">
                            <input type="text" name="username" id="username"
                                   class="form-control" placeholder="Username Here"
                            >
                        </div>
                    </div>

                    <div class="input-group form-group form-row">
                        <label for="password" class="col col-sm-3 col-form-label font-weight-bold text-right">Password:</label>
                        <div class="col col-sm-9">
                            <input type="password" name="password" id="password"
                                   class="form-control" placeholder="Password Here"
                            >
                        </div>
                    </div>

                </div>

            </div> <hr />

            <div class="row">
                <div class="col col-sm-2 offset-8">
                    {{ csrf_field() }}
                    <input type="submit" value="Register" class="btn btn-block btn-outline-success font-weight-bold" id="edit" onclick="return confirm('Are you sure you want to add this user?');">
                </div>
            </div>


        </form>

    </div>

@endsection
