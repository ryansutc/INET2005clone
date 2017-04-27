{{--USERS!--}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New User</div>
                    <form method="POST" action="/users" onsubmit="return validateNewUser()">
                        {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input name="name" class="form-control" value="{{ old('name') }}"/>
                        </div>
                        <div class="form-group">
                            <label for="email">User Email</label>
                            <input name="email" class="form-control"
                                   value="{{ old('email') }}" />
                        </div>
                        <div class="form-group">
                            <label for="password">User Password</label>
                            <input type="password" name="password" class="form-control"
                                   value="{{ old('password') }}" />
                        </div>

                        <div class="form-group">
                            <label>User Roles</label>
                            <p></p>

                            <input type="checkbox" name="admin" id="admin" class="checkbox-inline"
                                   value="admin" />
                            <label for="admin">Admin </label>
                            <p></p>
                            <input type="checkbox" name="editor" id="editor" class="checkbox-inline"
                                   value="{editor" />
                            <label for="editor">Editor </label>
                            <p></p>
                            <input type="checkbox" name="author" id="author" class="checkbox-inline"
                                   value="author" />
                            <label for="author">Author </label>
                            <p></p>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                    @if (count($errors)) {{--if there are errors, echo them--}}
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <p><a href="/users">Cancel</a></p>
            </div>
        </div>
    </div>

@endsection

