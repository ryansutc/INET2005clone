@extends('layouts.app')

@section('content')

    <style>
        {{\App\Csssheet::where('css_state', '=', 1)->get()->first()->css_text}}
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <nav>
                <ul class="nav nav-justified">
                    @foreach(\App\Page::get() as $pageitem)
                        <li @if($pageitem->id == $page->id)
                                class="active"
                            @endif
                        ><a href="/home/{{$pageitem->id}}">{{$pageitem->page_name}}</a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-header">{{ $page->page_name }}
                    <span style="background-color:red"> {{Session::get('crud') }}</span>
                </div>
            </div>
        </div>
        @foreach(DB::table('content_areas')->orderBy('disp_order')->get() as $contentarea)
            <div class="{{$contentarea->cont_alias}}">
                @foreach(DB::table('articles')->where('cont_id', $contentarea->id)->orderBy('updated_at', 'desc')->get() as $article)
                    @if($contentarea->id == 1 && ($article->page_id == $page->id || $article->all_pages == 1))
                        <div class="col-md-10">
                            <div class="panel panel-default {{$contentarea->cont_alias}}">
                                <div class="panel-body">
                                    <div class="rectangle">
                                        <p class="rectangle-text">{{ $article->art_name }}</p>
                                    </div>

                                    <h3 class="{{$contentarea->cont_alias}}"> {!! $article->art_title !!}</h3>
                                    <div>{!!  $article->art_desc !!}</div>
                                    <a class="story" id="{{$article->id}}" href="/story/{{ $article->id}}">Read Full Article</a>
                                    @if(Auth::check() && Auth::user()->isAuthor())
                                        <div>
                                            {{-- Store this page in case author goes to back end... --}}
                                            <a class="pull-right" href='{{"/articles/" . $article->id . "/edit" }}'>Edit</a>
                                        </div>
                                    @endif
                                    <p class="LastEdited" datetime=
                                        @if($article->updated_at)
                                            {{$article->updated_at}}
                                        @else
                                            {{$article->created_at}}
                                        @endif
                                    >
                                        Last Edited at @if($article->updated_at)
                                            {{$article->updated_at}}
                                        @else
                                            {{$article->created_at}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif($contentarea->id == 2 && ($article->page_id == $page->id || $article->all_pages == 1))

                        <div class="col-md-10">
                            <div class="panel panel-default {{$contentarea->cont_alias}}">
                                <div class="panel-body">
                                    <div class="rectangle-sm">
                                        <p class="rectangle-text">{{ $article->art_name }}</p>
                                    </div>
                                    <div>
                                        <a class="story" href="/story/{{ $article->id}}" id="{{$article->id}}">
                                            <h3 class="{{$contentarea->cont_alias}}"> {{ $article->art_title }}</h3>
                                        </a>
                                        <div>{!!  $article->art_desc !!}</div>
                                        @if(Auth::check() && Auth::user()->isAuthor())
                                            <div>
                                                {{-- Store this page in case author goes to back end... --}}
                                                <a class="pull-right" href='{{"/articles/" . $article->id . "/edit" }}'>Edit</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    @elseif($contentarea->id >= 3 && ($article->page_id == $page->id || $article->all_pages == 1))

                        <div class="col-xs-8 col-sm-5">
                            <div class="panel panel-default {{$contentarea->cont_alias}}">
                                <div class="panel-body">
                                    <a class="story" href="/story/{{ $article->id}}" id="{{$article->id}}">
                                        <h3 class="{{$contentarea->cont_alias}}"> {{ $article->art_title }}</h3>
                                    </a>
                                    @if(Auth::check() && Auth::user()->isAuthor())
                                        <div>
                                            {{-- Store this page in case author goes to back end... --}}
                                            <a class="pull-right" href='{{"/articles/" . $article->id . "/edit" }}'>Edit</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach

            </div>
        @endforeach
        @if(Auth::check() && Auth::user()->isAuthor())
            <div class="col-xs-8 col-sm-5">
                <div class="panel panel-default {{$contentarea->cont_alias}}">
                    <div class="panel-body">
                        <a href="../articles/create">
                            Add new Article
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
@endsection
