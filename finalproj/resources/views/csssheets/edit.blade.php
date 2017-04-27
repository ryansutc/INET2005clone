@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editing CSS Sheets</div>
                        <form method="POST" action="/csssheets/{{ $csssheet->id }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                            <div class="form-group">
                                <label for="css_name">CSS Name</label>
                                <input id="css_name" name="css_name" class="form-control" value="{{ $csssheet->css_name }}"/>
                            </div>
                            <div class="form-group">
                                <label for="css_desc">CSS Desc</label>
                                <textarea id="css_desc" name="css_desc" class="form-control">{{ $csssheet->css_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="css_text">CSS Text</label>
                                <textarea id="css_text" name="css_text" rows=10 class="form-control">{{ $csssheet->css_text }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="css_state">CSS State</label>
                                <input id="css_state" type="checkbox" name="css_state" class="checkbox-inline"
                                       @if($csssheet->css_state == 1)
                                               {{"checked"}}
                                       @endif
                                       value="1" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update CSS</button>
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
                    <p><a href="/csssheet">Cancel</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
