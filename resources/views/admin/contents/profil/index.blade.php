@extends('admin.template')

@section('header')
    <h1 class="m-0"> {{ __($pageName) }}</h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">{{ __($pageName) }}</li>
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-widgets.flash-message />
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profil.ubah') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-required-text-label />
                        <div class="form-group">
                            <label>Nama <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('name')])
                                type="text"
                                name="name"
                                value="{{ old('name', auth()->user()->name) }}"
                                required
                            />
                            <x-forms.invalid-feedback name="name" />
                        </div>
                        <div class="form-group">
                            <label>Email <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('email')])
                                type="email"
                                name="email"
                                value="{{ old('email', auth()->user()->email) }}"
                                required
                            />
                            <x-forms.invalid-feedback name="email" />
                        </div>
                        <div class="form-group">
                            <label>Username <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('username')])
                                type="text"
                                name="username"
                                value="{{ old('username', auth()->user()->username) }}"
                                required
                            />
                            <x-forms.invalid-feedback name="username" />
                        </div>
                        <div class="form-group">
                            <label>Password Konfirmasi <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('current_password')])
                                type="password"
                                name="current_password"
                                required
                            />
                            <x-forms.invalid-feedback name="current_password" />
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
