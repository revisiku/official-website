@extends('admin.template')

@section('header')
    <h1 class="m-0"> {{ __($pageName) }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('banner.index') }}">Tabel Banner</a></li>
    <li class="breadcrumb-item active">{{ __('Edit Banner') }}</li>
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 my-auto">
                            <h4 class="mb-0">{{ __('Edit Banner') }}</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="{{ route('banner.index') }}" class="btn btn-dark btn-custom">
                                <i class="fa fa-arrow-left mr-1"></i> {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner.ubah', $banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-required-text-label />
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Preview') }}</label>
                                <div class="preview">
                                    <img id="image" src="{{ asset($banner->image) }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Banner') }}</label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('image')])
                                    type="file"
                                    @style(['line-height: 20px'])
                                    name="image"
                                    onchange="imageOnChange(event, 'image')"
                                />
                                <x-message type="info" text="- Ukuran 1920 x 900 px" />
                                <x-forms.invalid-feedback name="image" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Judul Banner') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('title')])
                                    type="text"
                                    name="title"
                                    value="{{ old('title', $banner->title) }}"
                                    maxlenght="100"
                                    required
                                />
                                <x-forms.invalid-feedback name="title" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Menuju Link') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('link')])
                                    type="text"
                                    name="link"
                                    value="{{ old('link', $banner->link) }}"
                                    maxlenght="1000"
                                    required
                                />
                                <x-forms.invalid-feedback name="link" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Deskripsi') }} <x-required-indicator /></label>
                            <textarea
                                @class(['form-control', 'is-invalid' => $errors->has('description')])
                                name="description"
                                maxlenght="255"
                                required
                            >{{ old('description', $banner->description) }}</textarea>
                            <x-forms.invalid-feedback name="description" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Deskripsi (EN)') }} <x-required-indicator /></label>
                            <textarea
                                @class(['form-control', 'is-invalid' => $errors->has('en_description')])
                                name="en_description"
                                maxlenght="255"
                                required
                            >{{ old('en_description', $banner->en_description) }}</textarea>
                            <x-forms.invalid-feedback name="en_description" />
                        </div>
                        <div class="form-group col-md-6">
                            <div class="custom-control custom-switch mt-4">
                                <input
                                    style="color: #98fae6"
                                    id="switchNewWindow"
                                    type="checkbox"
                                    name="is_new_window"
                                    class="custom-control-input"
                                    @checked(old('is_new_window', $banner->isNewWindow()))
                                />
                                <label class="custom-control-label" for="switchNewWindow">{{ __('New Window') }}</label>
                            </div>
                            <div class="custom-control custom-switch mt-4">
                                <input
                                    style="color: #98fae6"
                                    id="switch"
                                    type="checkbox"
                                    name="is_publish"
                                    class="custom-control-input"
                                    @checked(old('is_publish', $banner->isPublish()))
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
