@foreach(\App\Page::with('creator', 'updater')->get() as $page)
    <p>
        {{ $page->page_name }}

        @if($page->updated_by)
            {{ $page->updater->name }}
        @endif
    </p>
@endforeach