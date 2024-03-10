@extends('admin.template')

@section('header')
    <h1 class="m-0"> {{ __($pageName) }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('post.kategori.index') }}">Tabel Kategori</a></li>
    <li class="breadcrumb-item active">{{ __('Edit Kategori') }}</li>
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 my-auto">
                            <h4 class="mb-0">Edit Kategori</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="{{ route('post.kategori.index') }}" class="btn btn-dark btn-custom">
                                <i class="fa fa-arrow-left mr-1"></i> {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.kategori.ubah', $postKategori->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-required-text-label />
                        <div class="form-group">
                            <label>{{ __('Nama Kategori') }} <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('name')])
                                type="text"
                                name="name"
                                value="{{ old('name', $postKategori->name) }}"
                                required
                            />
                            <x-forms.invalid-feedback name="name" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Nama Kategori (EN)') }} <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('en_name')])
                                type="text"
                                name="en_name"
                                value="{{ old('en_name', $postKategori->en_name) }}"
                                required
                            />
                            <x-forms.invalid-feedback name="en_name" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Tipe Kategori') }} <x-required-indicator /></label>
                            <select
                                @class(['form-control', 'is-invalid' => $errors->has('type')])
                                name="type"
                                required
                            >
                                @foreach ($tipe as $value)
                                    <option value="{{ $value }}" @selected(old('type', $postKategori->type) == $value)>{{ str($value)->ucfirst() }}</option>
                                @endforeach
                            </select>
                            <x-forms.invalid-feedback name="type" />
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

@push('css')

@endpush

@push('js')

@endpush
