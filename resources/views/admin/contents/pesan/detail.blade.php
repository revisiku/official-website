@extends('admin.template')

@section('header')
    <h1 class="m-0"> {{ __($pageName) }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('pesan.index') }}">Tabel Pesan</a></li>
    <li class="breadcrumb-item active">{{ __('Detail') }}</li>
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 my-auto">
                            <h4 class="mb-0">Detail Pesan</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="{{ route('pesan.index') }}" class="btn btn-dark btn-custom">
                                <i class="fa fa-arrow-left mr-1"></i> {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input
                                    @class(['form-control'])
                                    value="{{ $pesan->name }}"
                                    readonly
                                />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input
                                    @class(['form-control'])
                                    value="{{ $pesan->email }}"
                                    readonly
                                />
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <input
                                    @class(['form-control'])
                                    value="{{ $pesan->handphone }}"
                                    readonly
                                />
                            </div>
                            <div class="form-group mt-4 mb-1">
                                <label>Dikirim : {{ $pesan->getCreatedDiffForHumans() }}</label>
                            </div>
                            <div class="form-group mb-0">
                                <label>
                                    Status : {!! $pesan->getStatusHtml() !!}
                                    @if ($pesan->readed_by)
                                        ({{ $pesan->user->name }} | {{ $pesan->getUpdatedDiffForHumans() }})
                                    @endif
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>Pesan</label>
                                <textarea
                                    @class(['form-control h-100'])
                                    readonly
                                >{{ $pesan->message }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

@endsection

@push('css')

@endpush

@push('js')

@endpush
