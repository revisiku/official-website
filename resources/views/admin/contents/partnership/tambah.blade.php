@extends('admin.template')

@section('header')
    <h1 class="m-0"> {{ __($pageName) }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('partnership.index') }}">Tabel Partnership</a></li>
    <li class="breadcrumb-item active">{{ __('Tambah Partnership') }}</li>
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 my-auto">
                            <h4 class="mb-0">Tambah Partnership</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="{{ route('partnership.index') }}" class="btn btn-dark btn-custom">
                                <i class="fa fa-arrow-left mr-1"></i> {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('partnership.simpan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-required-text-label />
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Preview') }}</label>
                                <div class="preview">
                                    <img id="image">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Logo') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('image')])
                                    type="file"
                                    @style(['line-height: 20px'])
                                    name="image"
                                    onchange="imageOnChange(event, 'image')"
                                    required
                                />
                                <x-message type="info" text="- Ukuran 1988 x 900 px" />
                                <x-forms.invalid-feedback name="image" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Nama') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('name')])
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    maxlenght="100"
                                    required
                                />
                                <x-forms.invalid-feedback name="name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Link') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('link')])
                                    type="text"
                                    name="link"
                                    value="{{ old('link') }}"
                                    maxlenght="1000"
                                    required
                                />
                                <x-forms.invalid-feedback name="link" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch mt-4">
                                <input
                                    style="color: #98fae6"
                                    id="switch"
                                    type="checkbox"
                                    name="is_publish"
                                    class="custom-control-input"
                                    @checked(old('is_publish', true))
                                />
                                <label class="custom-control-label" for="switch">{{ __('Publis') }}</label>
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-0">
                            <button type="submit" class="btn btn-primary btn-custom">
                                <i class="fa fa-save mr-1"></i> {{ __('Simpan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <x-forms.image-onchange />
@endsection
