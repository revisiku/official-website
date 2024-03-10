@extends('public.template')

@section('content')
<div class="container">
    <div id="page" class="row">
        <div class="col-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Blog</li>
              </ol>
        </div>
        <div class="page-left col-md-8">
            <div class="page-header">
                <h1 class="mb-2">{{ __('Blog') }}</h1>
            </div>
            <div class="page-content">
                @include('public.partials.components.post.list', ['data' => $posts])
            </div>

            <div class="d-flex justify-content-md-end justify-content-center mb-5">
                {!! $posts->links() !!}
            </div>
        </div>
        <div class="page-right col-md-4">
            <h5 class="pt-3 pb-5">Popular Post</h5>
            @include('public.partials.components.post.list-highlight', ['data' => $popularPosts])
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
