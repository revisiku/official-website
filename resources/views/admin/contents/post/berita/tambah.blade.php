@extends('admin.template')

@section('header')
    <h1 class="m-0"> {{ __($pageName) }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('post.berita.index') }}">Tabel Berita</a></li>
    <li class="breadcrumb-item active">{{ __('Tambah Berita') }}</li>
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 my-auto">
                            <h4 class="mb-0">Tambah Berita</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="{{ route('post.berita.index') }}" class="btn btn-dark btn-custom">
                                <i class="fa fa-arrow-left mr-1"></i> {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.berita.simpan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-required-text-label />
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Cover') }}</label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('cover')])
                                    type="file"
                                    @style(['line-height: 20px'])
                                    name="cover"
                                />
                                <x-forms.invalid-feedback name="cover" />
                            </div>
                            <div class="form-group col-md-3">
                                <label>{{ __('Kategori') }} <x-required-indicator /></label>
                                <select
                                    @class(['form-control', 'is-invalid' => $errors->has('post_kategori_id')])
                                    name="post_kategori_id"
                                    required
                                >
                                    @foreach ($kategori as $row)
                                        <option value="{{ $row->id }}" @selected(old('post_kategori_id') == $row->id)>{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                <x-forms.invalid-feedback name="post_kategori_id" />
                            </div>
                            <div class="form-group col-md-3">
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
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Judul Berita') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('title')])
                                    type="text"
                                    name="title"
                                    value="{{ old('title') }}"
                                    maxlenght="255"
                                    required
                                />
                                <x-forms.invalid-feedback name="title" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Judul Berita (EN)') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('en_title')])
                                    type="text"
                                    name="en_title"
                                    value="{{ old('en_title') }}"
                                    maxlenght="255"
                                    required
                                />
                                <x-forms.invalid-feedback name="en_title" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Isi Singkat') }} <x-required-indicator /></label>
                                <textarea
                                @class(['form-control', 'is-invalid' => $errors->has('short')])
                                name="short"
                                rows="5"
                                maxlength="300"
                                required
                            >{{ old('short') }}</textarea>
                                <x-forms.invalid-feedback name="title" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Isi Singkat (EN)') }} <x-required-indicator /></label>
                                <textarea
                                @class(['form-control', 'is-invalid' => $errors->has('en_short')])
                                name="en_short"
                                rows="5"
                                maxlength="300"
                                required
                            >{{ old('en_short') }}</textarea>
                                <x-forms.invalid-feedback name="title" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Isi') }} <x-required-indicator /></label>
                            <textarea
                                @class(['form-control editor', 'is-invalid' => $errors->has('body')])
                                name="body"
                            >{{ old('body') }}</textarea>
                            <x-forms.invalid-feedback name="body" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Isi (EN)') }} <x-required-indicator /></label>
                            <textarea
                                @class(['form-control editor', 'is-invalid' => $errors->has('en_body')])
                                name="en_body"
                            >{{ old('en_body') }}</textarea>
                            <x-forms.invalid-feedback name="en_body" />
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

    <x-forms.editor />
@endsection
