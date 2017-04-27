@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">No Access</div>

                <div class="panel-body">
                    Sorry, you do not have sufficient rights to access these pages
                    with that login.
                    Contact your administrator
                    for help.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
