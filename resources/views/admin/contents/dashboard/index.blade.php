@extends('admin.template')

@section('header')
    <h1 class="m-0">Dashboard</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Akun</span>
                    <span class="info-box-number">{{ $adminCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info"><i class="fas fa-newspaper"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Berita</span>
                    <span class="info-box-number">{{ $newsCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info"><i class="fas fa-newspaper"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Blog</span>
                    <span class="info-box-number">{{ $blogCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info"><i class="fas fa-envelope"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Pesan</span>
                    <span class="info-box-number">{{ $messageCount }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row mt-3">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Testimoni</h5>
                </div>
                <div class="card-body">
                    @foreach ($lastTesti as $item)
                    @if (!$loop->first) <hr> @endif
                        <div class="row">
                            <div class="col">
                                <h6 class="">{{ $item->people_name }} - {{ $item->people_jobs }}</h6>
                                <p class="text-muted mb-0">{{ $item->created_at->format('d/m/Y') }}</p>
                                <p class="mb-0 mt-1"><a title="Edit" href="{{ route('testimoni.edit', $item->id) }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Post Terakhir</h5>
                </div>
                <div class="card-body">
                    @foreach ($lastPost as $item)
                        @if (!$loop->first) <hr> @endif
                        <div @class(['row'])>
                            <div class="col">
                                <a title="Review Post" href="{{ url('/post/'.$item->slug) }}?review=1" target="_BLANK">
                                    <h6>{{ $item->title }}</h6>
                                </a>
                                <div class="row">
                                    <div class="col-8">
                                        <p class="text-muted mb-0">
                                            Oleh: {{ $item->user->name }} | {{ Str::ucfirst($item->type) }} : {{ $item->postCategory->name }} | {{ $item->created_at->format('d/m/Y') }}
                                        </p>
                                        <p class="mb-0 mt-1">
                                            <a title="Edit" href="{{ route('post.'.$item->type.'.edit', $item->id) }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </a> |
                                            <a class="ml-1" title="Review Post" href="{{ url('/post/'.$item->slug) }}?review=1" target="_BLANK">
                                                <i class="fa fa-eye"></i> Review
                                            </a>
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-muted mb-0">{!! $item->getStatusHtml() !!} | {{ \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
