@extends('layouts.app')

@section('content')
    <script src="js/myfunctions.js" type="text/javascript"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome to the Content Areas Configuration Page</div>

                    <div class="panel-body">
                        @if (Session::has('crud'))
                            <h3>{{Session::get('crud') }}</h3>
                        @endif
                        <table>
                            <thead>
                            <tr>
                                <td><b>Content Area ID</b></td>
                                <td><b>Content Area Name</b></td>
                                <td><b>Content Area Alias</b></td>
                                <td><b>Content Area Desc</b></td>
                                <td><b>Display Order</b></td>
                                <td><b>Created On</b></td>
                                <td><b>Modified On</b></td>
                                <td><b>Created By</b></td>
                                <td><b>Modified By</b></td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\ContentArea::with('creator', 'updater')->get() as $content_area)
                                <tr>
                                    <td> {{ $content_area->id }}</td>
                                    <td> {{ $content_area->cont_name }}</td>
                                    <td> {{ $content_area->cont_alias }}</td>
                                    <td> {{ $content_area->cont_desc }}</td>
                                    <td> {{ $content_area->disp_order }}</td>
                                    <td> {{ $content_area->created_at }}</td>
                                    <td> {{ $content_area->updated_at }}</td>
                                    <td> {{ $content_area->creator->name }}</td>
                                    <td>
                                        @if($content_area->updated_by)
                                            {{ $content_area->updater->name }}
                                        @endif
                                    </td>

                                    <td>
                                        <a href="/content_areas/{{$content_area->id}}/edit">
                                            <img src="img/edit.png" alt="Edit" style="width:15px">
                                        </a>

                                    </td>
                                    <td>
                                        <form action="/content_areas/{{ $content_area->id }}" method='post' name='deleteRowForm' onsubmit='return confirmDelete()' >
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                                            <input name="id" type='hidden' value=" {{ $content_area->id }}"/>
                                            <input name="deleteRow" type="image" src="img/x.png" alt="submit" value="deleteRow">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        <p><a href="/content_areas/create">Add a new Content Area</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection