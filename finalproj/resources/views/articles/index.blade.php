@extends('layouts.app')

@section('content')
    <script src="js/myfunctions.js" type="text/javascript"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome to the Articles Configuration Page</div>

                    <div class="panel-body">
                        @if (Session::has('crud'))
                            <h3>{{Session::get('crud') }}</h3>
                        @endif
                        <table>
                            <thead>
                            <tr>
                                <td><b>Article ID</b></td>
                                <td><b>Article Name</b></td>
                                <td><b>Article Title</b></td>
                                <td><b>Global</b></td>
                                <td><b>Page Id</b></td>
                                <td><b>Content Id</b></td>
                                <td><b>Created On</b></td>
                                <td><b>Modified On</b></td>
                                <td><b>Created By</b></td>
                                <td><b>Modified By</b></td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(\App\Article::with('creator', 'updater')->get() as $article)
                                <tr>
                                    <td> {{ $article->id }}</td>
                                    <td><a href="#" class="storyclick" id="{{$article->id}}">{{ $article->art_name }}</a></td>
                                    <td> {{ $article->art_title }}</td>
                                    <td> {{ $article->all_pages }}</td>
                                    <td> {{ $article->page_id }}</td>
                                    <td> {{ $article->cont_id }}</td>
                                    <td> {{ $article->created_at }}</td>
                                    <td> {{ $article->updated_at }}</td>
                                    <td> {{ $article->creator->name }}</td>
                                    <td>
                                        @if($article->updated_by)
                                            {{ $article->updater->name }}
                                        @endif
                                    </td>

                                    <td>
                                        <a href="/articles/{{$article->id}}/edit">
                                            <img src="img/edit.png" alt="Edit" style="width:15px">
                                        </a>

                                    </td>
                                    <td>
                                        <form action="/articles/{{ $article->id }}" method='post' name='deleteRowForm' onsubmit='return confirmDelete()' >
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                                            <input name="id" type='hidden' value=" {{ $article->id }}"/>
                                            <input name="deleteRow" type="image" src="img/x.png" alt="submit" value="deleteRow">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-body">
                        <p><a href="/articles/create">Add a new Article</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection