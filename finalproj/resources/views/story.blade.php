@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href={{ URL::asset("css/justified-nav.css") }} />
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default {{$article->contentType->cont_alias}}">
                    <div class="panel-heading">{{$article->art_name}}</div>
                    <div class="panel-body">

                        <h3> {{ $article->art_title }}</h3>
                        <div> {{$article->art_desc }}</div>
                        <div>{!! $article->art_text !!}</div>

                    </div>
                </div>
                <a href="/home">Back</a>
            </div>
        </div>
    </div>
@endsection