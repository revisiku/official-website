@extends('admin.template')

@section('header')
    <h1 class="m-0"> {{ __($pageName) }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('akun.index') }}">Tabel Akun</a></li>
    <li class="breadcrumb-item active">{{ __('Edit Akun') }}</li>
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 my-auto">
                            <h4 class="mb-0">{{ __('Edit Akun') }}</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a href="{{ route('akun.index') }}" class="btn btn-dark btn-custom">
                                <i class="fa fa-arrow-left mr-1"></i> {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('akun.ubah', $akun->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-required-text-label />
                        <div class="form-group">
                            <label>{{ __('Nama') }} <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('name')])
                                type="text"
                                name="name"
                                value="{{ old('name', $akun->name) }}"
                                required
                            />
                            <x-forms.invalid-feedback name="name" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Email') }} <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('email')])
                                type="email"
                                name="email"
                                value="{{ old('email', $akun->email) }}"
                                required
                            />
                            <x-forms.invalid-feedback name="email" />
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Username') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('username')])
                                    type="text"
                                    name="username"
                                    value="{{ old('username', $akun->username) }}"
                                    required
                                />
                                <x-forms.invalid-feedback name="username" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Password') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('password')])
                                    type="password"
                                    name="password"
                                    required
                                />
                                <x-forms.invalid-feedback name="password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input
                                    style="color: #98fae6"
                                    id="switch"
                                    type="checkbox"
                                    name="is_active"
                                    class="custom-control-input"
                                    @checked(old('is_active', $akun->isActive()))
                                />
                                <label class="custom-control-label" for="switch">{{ __('Aktif') }}</label>
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

@push('style')

@endpush

@push('script')

@endpush
