
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Page</div>
                    <form method="POST" action="/pages">
                        {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                        <div class="form-group">
                            <label for="page_name">Page Name</label>
                            <input name="page_name" class="form-control" value="{{ old('page_name') }}"/>
                        </div>
                        <div class="form-group">
                            <label for="page_name">Page Alias</label>
                            <input name="page_alias" class="form-control"
                                   value="{{ old('page_alias') }}" maxlength="12" size="12"/>
                        </div>
                        <div class="form-group">
                            <label for="page_name">Page Desc</label>
                            <textarea name="page_desc" class="form-control">
                                    {{ old('page_desc') }}
                                </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Page</button>
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
                <p><a href="/pages">Cancel</a></p>
            </div>
        </div>
    </div>
    </div>
@endsection

