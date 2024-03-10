@extends('public.template')

@section('content')
    <div class="container">
        <div id="post-detail" class="row">
            <div class="col-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active">{{ $post->title }}</li>
                </ol>
            </div>
            <div class="post-content-left col-md-8">
                <div class="post-detail-header">
                    <h1 class="mb-2">{{ $post->title }}</h1>
                    <small>{{ __('Oleh') }} : {{ $post->user->name }} - <span class="text-muted">{{ $post->publishedAtLongConverter() }}</span></small>
                </div>
                <div class="post-detail-content">
                    {!! $post->body !!}
                </div>
            </div>
            <div class="post-content-right col-md-4">
                <h5 class="pt-3 pb-5">Latest Post</h5>
                @include('public.partials.components.post.list-highlight', ['data' => $latestPosts])
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
