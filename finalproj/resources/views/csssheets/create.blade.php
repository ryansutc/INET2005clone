
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New CSS</div>
                    <form method="POST" action="/csssheets">
                        {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                        <div class="form-group">
                            <label for="css_name">CSS Name</label>
                            <input name="css_name" class="form-control" value="{{ old('css_name') }}"/>
                        </div>
                        <div class="form-group">
                            <label for="css_name">CSS Alias</label>
                            <input name="css_alias" class="form-control"
                                   value="{{ old('css_alias') }}" maxlength="12" size="12"/>
                        </div>
                        <div class="form-group">
                            <label for="css_name">CSS Desc</label>
                            <textarea name="css_desc" class="form-control">{{ old('css_desc') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="css_text">CSS Desc</label>
                            <textarea name="css_text" class="form-control">{{ old('css_text') }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add CSS</button>
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
                <p><a href="/css">Cancel</a></p>
            </div>
        </div>
    </div>

@endsection

