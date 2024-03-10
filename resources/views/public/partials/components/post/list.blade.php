@foreach ($data as $item)
    <article @class(['entry', 'pt-3' => $loop->first])>
        <h3 class="entry-header mb-2 p-0">
            <a href="{{ LangService::url('post/'.$item->slug) }}">{!! $item->title !!}</a>
        </h3>
        <text class="text-muted m-0 p-0">{{ $item->short }}</text>
        <ul class="d-flex mt-3">
            <li class="text-muted"><i class="fa fa-user"></i> <span>{{ $item->user->name }}</span></li>
            <li class="text-muted"><i class="fa fa-clock-o"></i> <span><time>{{ $item->publishedAtLongConverter() }}</time></span></li>
            <li class="text-muted"><i class="fa fa-tags"></i> <span>{{ $item->postCategory->name }}</span></li>
        </ul>
    </article>
    <hr class="my-5">
@endforeach
