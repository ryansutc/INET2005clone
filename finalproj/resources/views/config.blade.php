@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome to the Backend Configuration Page</div>

                    <div class="panel-body">
                        <ul>

                            @foreach( App\User::find(Auth::user()->id)->roles()->orderBy('role_desc')->get() as $role)

                                @if($role->role_desc == 'Admin')
                                    <li> <a href="/users"> Manage Users</a> </li>
                                @elseif($role->role_desc == 'Edit')
                                    <li> <a href="/pages"> Manage Pages </a> </li>
                                    <li> <a href="/articles">Manage Articles</a> </li>
                                    <li> <a href="/csssheets"> Manage CSS </a></li>
                                    <li> <a href="/content_areas"> Manage Content Areas </a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection