@extends('public.template')

@section('content')
    <div class="container">
        <div id="page" class="row align-items-center" style="height: calc(100vh - 200px)">
            <div class="container-fluid">
                <!-- 404 Error Text -->
                <div class="text-center">
                    <h3 class="error error-number p-0">404</h3>
                    <p class="error error-text mb-5">Not Found</p>
                    <p class="error-description mb-1">{{ __('Maaf, postingan tidak tersedia pastikan alamat URL Anda benar.') }}</p>
                    <a href="{{ LangService::url('blog') }}">&larr; Blog</a>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection

@push('script')

@endpush
