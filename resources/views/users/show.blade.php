@extends('layouts/header')

@section('content')
<div class="card">

    <form class="card-body" method="POST" action="/user/{{$user->id}}">
        <div class="card-title">
            <h4 class="card-title"><span id="description"></span> User Details</h4> <hr />
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group form-group form-row">
                    <label for="firstname" class="col col-sm-3 col-form-label font-weight-bold text-right">First Name:</label>
                    <div class="col col-sm-9">
                        <input type="text" name="firstname" id="firstname" readonly
                               class="form-control" placeholder="First Name Here"
                               value="{{$user->first_name}}"
                        >
                    </div>
                </div>

                <div class="input-group form-group form-row">
                    <label for="middlename" class="col col-sm-3 col-form-label font-weight-bold text-right">Middle Name:</label>
                    <div class="col col-sm-9">
                        <input type="text" name="middlename" id="middlename" readonly
                               class="form-control" placeholder="Middle Name Here"
                               value="{{$user->middle_name}}"
                        >
                    </div>
                </div>

                <div class="input-group form-group form-row">
                    <label for="lastname" class="col col-sm-3 col-form-label font-weight-bold text-right">Last Name:</label>
                    <div class="col col-sm-9">
                        <input type="text" name="lastname" id="lastname" readonly
                               class="form-control" placeholder="Last Name Here"
                               value="{{$user->last_name}}"
                        >
                    </div>
                </div>

            </div>

            <div class="col-sm-6">
                <div class="input-group form-group form-row">
                    <label for="email" class="col col-sm-3 col-form-label font-weight-bold text-right">Email:</label>
                    <div class="col col-sm-9">
                        <input type="text" name="email" id="email" readonly
                               class="form-control" placeholder="Email Here"
                               value="{{$user->email}}"
                        >
                    </div>
                </div>

                <div class="input-group form-group form-row">
                    <label for="username" class="col col-sm-3 col-form-label font-weight-bold text-right">Username:</label>
                    <div class="col col-sm-9">
                        <input type="text" name="username" id="username" readonly
                               class="form-control" placeholder="Username Here"
                               value="{{$user->username}}"
                        >
                    </div>
                </div>

            </div>

        </div> <hr />

        <div class="row">
            <div class="col col-sm-2 offset-8">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <input type="submit" value="Edit" class="btn btn-block btn-outline-primary font-weight-bold" id="edit" onclick="return editForm();">
            </div>
            <div class="col sol-sm-1">
                <button class="btn btn-outline-danger font-weight-bold" style="display: none" id="cancel" onclick=" return cancelEdit()">
                    Cancel
                </button>
            </div>
        </div>


    </form>

</div>

@endsection

@section('script')
    <script type="text/javascript">
        let editable = false;
        function editForm() {
            if(editable) {
                return confirm('Are you sure you want to update this data?');
            } else {
                editable = true;
                document.getElementById('firstname').removeAttribute('readonly');
                document.getElementById('middlename').removeAttribute('readonly');
                document.getElementById('lastname').removeAttribute('readonly');
                document.getElementById('email').removeAttribute('readonly');
                document.getElementById('username').removeAttribute('readonly');
                document.getElementById('cancel').style.display = 'block';
                document.getElementById('edit').value = 'Update';
                document.getElementById('description').innerHTML = 'Edit';
            }
            return false;
        }

        function cancelEdit() {
            document.getElementById('firstname').setAttribute('readonly', true);
            document.getElementById('middlename').setAttribute('readonly', true);
            document.getElementById('lastname').setAttribute('readonly', true);
            document.getElementById('email').setAttribute('readonly', true);
            document.getElementById('username').setAttribute('readonly', true);
            document.getElementById('cancel').style.display = 'none';
            document.getElementById('edit').value = 'Edit';
            document.getElementById('description').innerHTML = '';
            editable = false;
            return false;
        }
    </script>
@endsection
