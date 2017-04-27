@extends('layouts.app')

@section('content')
    <script src="js/myfunctions.js" type="text/javascript"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome to the CSS Configuration Page</div>

                    <div class="panel-body">
                        @if (Session::has('crud'))
                            <h3>{{Session::get('crud') }}</h3>
                        @endif
                        <table>
                            <thead>
                            <tr>
                                <td><b>CSS ID</b></td>
                                <td><b>CSS Name</b></td>
                                <td><b>CSS Desc</b></td>
                                <td><b>Active</b></td>
                                <td><b>Created At</b></td>
                                <td><b>Edited At</b></td>
                                <td><b>Created By</b></td>
                                <td><b>Modified By</b></td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(DB::table('csssheets')->get() as $csssheet)
                                <tr>
                                    <td> {{ $csssheet->id }}</td>
                                    <td> {{ $csssheet->css_name }}</td>
                                    <td> {{ $csssheet->css_desc }}</td>
                                    <td id="{{$csssheet->id}}" class="css_state">
                                        @if($csssheet->css_state == 1)
                                            <img src="img/check.png" alt="Edit" style="width:10px" />
                                        @endif
                                    </td>
                                    <td> {{ $csssheet->created_at }}</td>
                                    <td> {{ $csssheet->updated_at }}</td>
                                    <td> {{ $csssheet->created_by }}</td>
                                    <td> {{ $csssheet->updated_by }}</td>

                                    <td>
                                        <a href="/csssheets/{{$csssheet->id}}/edit">
                                            <img src="img/edit.png" alt="Edit" style="width:15px">
                                        </a>
                                    </td>
                                    <td>
                                        <form action="/csssheets/{{ $csssheet->id }}" method='post' name='deleteRowForm' onsubmit='return confirmDelete()' >
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                                            <input name="id" type='hidden' value=" {{ $csssheet->id }}"/>
                                            <input name="deleteRow" type="image" src="img/x.png" alt="submit" value="deleteRow">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        <p><a href="/csssheets/create">Add a new CSS Sheet</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection