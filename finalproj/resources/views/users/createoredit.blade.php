
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User</div>


                    {!! Form::model($user, ['action' => 'UserController@store']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email Address') !!}
                        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('User Roles') !!}
                        <p></p>

                        {!! Form::label('admin') !!}
                        @if($user->isAdmin())
                            {!! "checked" !!}
                        @endif
                        {!! Form::checkbox('admin', !!}
                            @if($user->isAdmin())
                                {!! "checked" !!}
                            @endif
                        {!! ['class' => 'checkbox-inline', 'id' =>'admin'] !!}
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

                    <button class="btn btn-success" type="submit">Apply</button>

                    {!! Form::close() !!}
                    @if (count($errors))
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



