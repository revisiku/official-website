@extends('admin.template')

@section('header')
    <h1 class="m-0"> {{ __($pageName) }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('testimoni.index') }}">Tabel Testimnoi</a></li>
    <li class="breadcrumb-item active">{{ __('Edit Testimnoi') }}</li>
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 my-auto">
                            <h4 class="mb-0">Edit Testimoni</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="{{ route('testimoni.index') }}" class="btn btn-dark btn-custom">
                                <i class="fa fa-arrow-left mr-1"></i> {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('testimoni.ubah', $testimoni->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-required-text-label />
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Foto') }}</label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('image')])
                                    type="file"
                                    @style(['line-height: 20px'])
                                    name="image"
                                />
                                <x-forms.invalid-feedback name="image" />
                            </div>
                            <div class="form-group col-md-6">
                                <div class="custom-control custom-switch mt-4">
                                    <input
                                        style="color: #98fae6"
                                        id="switch"
                                        type="checkbox"
                                        name="is_publish"
                                        class="custom-control-input"
                                        @checked(old('is_publish', $testimoni->isPublish()))
                                    />
                                    <label class="custom-control-label" for="switch">{{ __('Publis') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Nama') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('people_name')])
                                    type="text"
                                    name="people_name"
                                    value="{{ old('people_name', $testimoni->people_name) }}"
                                    maxlength="100"
                                    required
                                />
                                <x-forms.invalid-feedback name="people_name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Status / Pekerjaan') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('people_jobs')])
                                    type="text"
                                    name="people_jobs"
                                    value="{{ old('people_jobs', $testimoni->people_jobs) }}"
                                    maxlength="100"
                                    required
                                />
                                <x-forms.invalid-feedback name="people_jobs" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="mb-0">{{ __('Testimoni') }} <x-required-indicator /></label>
                                <x-message class="mb-2" type="info" text="- Maksimal 500 kata" />
                                <textarea
                                    @class(['form-control', 'is-invalid' => $errors->has('body')])
                                    name="body"
                                    maxlength="500"
                                    rows="8"
                                    required
                                >{{ old('body', $testimoni->body) }}</textarea>
                                <x-forms.invalid-feedback name="body" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mb-0">{{ __('Testimoni (EN)') }} <x-required-indicator /></label>
                                <x-message class="mb-2" type="info" text="- Maksimal 500 kata" />
                                <textarea
                                    @class(['form-control', 'is-invalid' => $errors->has('en_body')])
                                    name="en_body"
                                    maxlength="500"
                                    rows="8"
                                    required
                                >{{ old('en_body', $testimoni->en_body) }}</textarea>
                                <x-forms.invalid-feedback name="en_body" />
                            </div>
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
@endsection
