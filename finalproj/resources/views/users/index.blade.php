@extends('layouts.app')

@section('content')
    <script src="js/myfunctions.js" type="text/javascript"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome to the Pages Configuration Page</div>

                    <div class="panel-body">
                        @if (Session::has('crud'))
                            <h3>{{Session::get('crud') }}</h3>
                        @endif
                        <table>
                            <thead>
                            <tr>
                                <td><b>ID</b></td>
                                <td><b>Name</b></td>
                                <td><b>Email</b></td>
                                <td><b>Admin</b></td>
                                <td><b>Editor</b></td>
                                <td><b>Author</b></td>
                                <td><b>Created At</b></td>
                                <td><b>Edited At</b></td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\User::with('roles')->get() as $user)
                                <tr>
                                    <td> {{ $user->id }}</td>
                                    <td> {{ $user->name }}</td>
                                    <td> {{ $user->email }}</td>
                                    <td>
                                        @if($user->isAdmin())
                                            <img src="img/check.png" alt="Edit" style="width:10px" />
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->isEditor())
                                            <img src="img/check.png" alt="Edit" style="width:10px" />
                                         @endif
                                    </td>
                                    <td>
                                        @if($user->isAuthor())
                                            <img src="img/check.png" alt="Edit" style="width:10px" />
                                        @endif
                                    </td>
                                    <td> {{ $user->created_at }}</td>
                                    <td> {{ $user->updated_at }}</td>
                                    <td>
                                        <a href="/users/{{$user->id}}/edit">
                                            <img src="img/edit.png" alt="Edit" style="width:15px" />
                                        </a>

                                    </td>
                                    <td>
                                        <form action="/users/{{ $user->id }}" method='post' name='deleteRowForm' onsubmit='return confirmDelete()' >
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                                            <input name="id" type='hidden' value=" {{ $user->id }}"/>
                                            <input name="deleteRow" type="image" src="img/x.png" alt="submit" value="deleteRow">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        <p><a href="/users/create">Add a new User</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection