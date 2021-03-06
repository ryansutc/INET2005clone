@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editing Article</div>
                        <form method="POST" action="/articles/{{ $article->id }}">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }} {{--supposed to fix token issue: https://laravel.com/docs/5.3/csrf --}}
                            <div class="form-group">
                                <label for="art_name">Article Name</label>
                                <input name="art_name" class="form-control" value="{{ $article->art_name }}"/>
                            </div>
                            <div class="form-group">
                                <label for="art_title">Article Title</label>
                                <input name="art_title" class="form-control"
                                       value="{{ $article->art_title  }}" maxlength="45" size="45"/> {{--need javascript to handle this--}}
                            </div>
                            <div class="form-group">
                                <label for="art_desc">Article Desc</label>
                                <textarea name="art_desc" class="form-control" value="{{ $article->art_desc }}">{{ $article->art_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="cont_id">Content Area</label>
                                <select name="cont_id" class="form-control">
                                    @foreach(\App\ContentArea::all() as $contentarea)
                                        @if($contentarea->id == $article->cont_id){
                                            <option value="{{ $contentarea->id }}" selected>{{ $contentarea->cont_name }}</option>
                                        @else
                                            <option value="{{ $contentarea->id }}">{{ $contentarea->cont_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="page_id">Page to Appear On</label>
                                <select name="page_id" class="form-control" id="articlepage">
                                    @foreach(\App\Page::all() as $page)
                                        @if($page->id  == $article->page_id){
                                            <option value="{{ $page->id }}" selected>{{ $page->page_name }}</option>
                                        @else
                                            <option value="{{ $page->id }}">{{ $page->page_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="all_pages">Show on all Pages</label>
                                <input type="checkbox" name="all_pages" id="all_pages" class="checkbox-inline"
                                       value="1"
                                       @if($page->all_pages == 1)
                                            {{ "checked" }}
                                       @endif
                                       onclick="disableArticlePage()" />
                            </div>
                            <div class="form-group">
                                <label for="art_text">Article Full Text</label>
                                <textarea name="art_text" class="form-control" rows="10"
                                          value="{{ old('art_text') }}">{{ $article->art_text }}</textarea>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Page</button>
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
                    <p><a href="/articles">Cancel</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
