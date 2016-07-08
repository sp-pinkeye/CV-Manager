<!-- resources/views/users.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('user') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- User Name -->
            <div class="form-group">
                <label for="user" class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-6">
                    <input type="text" name="firstname" id="firstname" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="user" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-6">
                    <input type="text" name="lastname" id="lastname" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label for="user" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" name="username" id="username" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="user" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="passowrd" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="user" class="col-sm-3 control-label">Telephone</label>
                <div class="col-sm-6">
                    <input type="text" name="telephone" id="telephone" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="user" class="col-sm-3 control-label">Mobile</label>
                <div class="col-sm-6">
                    <input type="text" name="mobile" id="mobile" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="user" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" name="email" id="email" class="form-control">
                </div>
            </div>



            <!-- Add User Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                       <i class="fa fa-plus"></i> Add User
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Users -->
    @if (count($users) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Users
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>User</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $user->firstname.' '.$user->lastname }}</div>
                                </td>

									    <!-- Delete Button -->
									    <td>
									        <form action="{{ url('user/'.$user->id) }}" method="POST">
									            {{ csrf_field() }}
									            {{ method_field('DELETE') }}
									
									            <button type="submit" class="btn btn-danger">
									                <i class="fa fa-trash"></i> Delete
									            </button>
									        </form>
									    </td>
									</tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection