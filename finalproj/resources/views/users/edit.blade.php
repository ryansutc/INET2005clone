@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editing Existing User {{$user->name}}</div>
                        <form method="POST" action="/users/{{ $user->id }}"
                              onsubmit="return validateUsers('{{$user->id}}', '{{ Auth::user()->id }}')">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input name="name" class="form-control" value="{{ $user->name }}"/>
                            </div>
                            <div class="form-group">
                                <label for="email">User Email</label>
                                <input name="email" class="form-control"
                                       value="{{ $user->email }}" />
                            </div>

                            <div class="form-group">
                                <label>User Roles</label>
                                <p></p>

                                <input type="checkbox" name="admin" id="admin" class="checkbox-inline"
                                       value="admin"
                                        @if($user->isAdmin())
                                            {{ "checked" }}
                                        @endif
                                />
                                <label for="admin">Admin </label>
                                <p></p>
                                <input type="checkbox" name="editor" id="editor" class="checkbox-inline"
                                       value="editor"
                                        @if($user->isEditor())
                                            {{ "checked" }}
                                        @endif
                                />
                                <label for="editor">Editor </label>
                                <p></p>
                                <input type="checkbox" name="author" class="checkbox-inline"
                                       value="author"
                                        @if($user->isAuthor())
                                            {{ "checked" }}
                                        @endif
                                />
                                <label for="author">Author </label>
                                <p></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update User</button>
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
    </div>
@endsection
