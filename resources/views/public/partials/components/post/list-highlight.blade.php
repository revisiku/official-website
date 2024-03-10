@foreach ($data as $item)
    <article @class(['entry'])>
        <h3 class="page-right-entry-header mb-2 p-0">
            <a href="{{ LangService::url('post/'.$item->slug) }}">{!! $item->title !!}</a>
        </h3>
        <ul class="d-flex mt-1 page-right-entry-indicators">
            <li class="text-muted"><i class="fa fa-user"></i> <span>{{ $item->user->name }}</span></li>
            <li class="text-muted"><i class="fa fa-clock-o"></i> <span><time>{{ $item->publishedAtShortConverter() }}</time></span></li>
            <li class="text-muted"><i class="fa fa-tags"></i> <span>{{ $item->postCategory->name }}</span></li>
        </ul>
    </article>
    <hr class="my-4">
@endforeach
