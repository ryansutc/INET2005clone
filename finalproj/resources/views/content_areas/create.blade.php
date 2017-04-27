
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Content Area</div>
                    <form method="POST" action="/content_areas" onsubmit="return validateNewContentArea()">
                        {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                        <div class="form-group">
                            <label for="cont_name">Content Area Name</label>
                            <input name="cont_name" class="form-control" value="{{ old('cont_name') }}"/>
                        </div>
                        <div class="form-group">
                            <label for="cont_alias">Content Area Alias</label>
                            <input name="cont_alias" class="form-control"
                                   value="{{ old('cont_alias') }}" maxlength="20" size="20"/>
                        </div>
                        <div class="form-group">
                            <label for="cont_desc">Content Area Desc</label>
                            <textarea name="cont_desc" class="form-control" value="{{ old('cont_desc') }}">{{ old('cont_desc') }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="disp_order">Display Order</label>
                            <input name="disp_order"  type="number"
                                   value="{{ old('disp_order') }}" max="20" min="1"/>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Content Area</button>
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
                <p><a href="/content_areas">Cancel</a></p>
            </div>
        </div>
    </div>
    </div>
@endsection

