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
                                <td><b>Page ID</b></td>
                                <td><b>Page Name</b></td>
                                <td><b>Page Alias</b></td>
                                <td><b>Page Desc</b></td>
                                <td><b>Created At</b></td>
                                <td><b>Edited At</b></td>
                                <td><b>Created By</b></td>
                                <td><b>Modified By</b></td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Page::with('creator', 'updater')->get() as $page)
                                <tr>
                                    <td> {{ $page->id }}</td>
                                    <td> {{ $page->page_name }}</td>
                                    <td> {{ $page->page_alias }}</td>
                                    <td> {{ $page->page_desc }}</td>
                                    <td> {{ $page->created_at }}</td>
                                    <td> {{ $page->updated_at }}</td>
                                    <td> {{ $page->creator->name }}</td>
                                    <td>
                                        @if($page->updated_by)
                                            {{ $page->updater->name }}
                                        @endif
                                    </td>

                                    <td>
                                        <a href="/pages/{{$page->id}}/edit">
                                            <img src="img/edit.png" alt="Edit" style="width:15px">
                                        </a>

                                    </td>
                                    <td>
                                        <form action="/pages/{{ $page->id }}" method='post' name='deleteRowForm' onsubmit='return confirmDelete()' >
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                                            <input name="id" type='hidden' value=" {{ $page->id }}"/>
                                            <input name="deleteRow" type="image" src="img/x.png" alt="submit" value="deleteRow">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        <p><a href="/pages/create">Add a new Page</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection