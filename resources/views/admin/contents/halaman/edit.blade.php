@extends('admin.template')

@section('header')
    <h1 class="m-0"> {{ __($pageName) }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">{{ __('Edit Halaman') }}</li>
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <x-widgets.flash-message />
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 my-auto">
                            <h4 class="mb-0">Edit Halaman : {!! $halaman->title !!}</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <x-forms.link-to
                                target="_blank"
                                href="{{ url($halaman->slug) }}"
                            >
                                <i class="fa fa-arrow-up fa-rotate-45 mr-1"></i> Lihat Halaman
                            </x-forms.link-to>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('halaman.ubah', $halaman->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-required-text-label />
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Preview') }}</label>
                                <div class="preview">
                                    <img id="image" src="{{ asset($halaman->cover) }}">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Cover') }}</label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('cover')])
                                    type="file"
                                    @style(['line-height: 20px'])
                                    name="cover"
                                    onchange="imageOnChange(event, 'image')"
                                />
                                <x-forms.invalid-feedback name="cover" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Nama Halaman') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('title')])
                                    type="text"
                                    name="title"
                                    value="{{ old('title', $halaman->title) }}"
                                    maxlenght="100"
                                    required
                                />
                                <x-forms.invalid-feedback name="title" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Nama Halaman (EN)') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('en_title')])
                                    type="text"
                                    name="en_title"
                                    value="{{ old('en_title', $halaman->en_title) }}"
                                    maxlenght="100"
                                    required
                                />
                                <x-forms.invalid-feedback name="en_title" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Isi Halaman') }} <x-required-indicator /></label>
                            <textarea
                                @class(['form-control editor', 'is-invalid' => $errors->has('body')])
                                name="body"
                            >{{ old('body', $halaman->body) }}</textarea>
                            <x-forms.invalid-feedback name="body" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Isi Halaman (EN)') }} <x-required-indicator /></label>
                            <textarea
                                @class(['form-control editor', 'is-invalid' => $errors->has('en_body')])
                                name="en_body"
                            >{{ old('en_body', $halaman->en_body) }}</textarea>
                            <x-forms.invalid-feedback name="en_body" />
                        </div>
                        <div class="form-group mt-4 mb-0">
                            <button type="submit" class="btn btn-primary btn-custom">
                                <i class="fa fa-save mr-1"></i> {{ __('Simpan Perubahan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <x-forms.editor />
    <x-forms.image-onchange />
@endsection
