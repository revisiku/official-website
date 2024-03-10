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
        <div class="col-md-10">
            <x-widgets.flash-message />
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('infoKontak.ubah', $kontak->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-required-text-label />
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nama Kantor  <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('place_name')])
                                    type="text"
                                    name="place_name"
                                    value="{{ old('place_name', $kontak->place_name) }}"
                                    required
                                />
                                <x-forms.invalid-feedback name="place_name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nama Kantor (EN)  <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('en_place_name')])
                                    type="text"
                                    name="en_place_name"
                                    value="{{ old('en_place_name', $kontak->en_place_name) }}"
                                    required
                                />
                                <x-forms.invalid-feedback name="en_place_name" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Alamat 1  <x-required-indicator /></label>
                                <textarea
                                    @class(['form-control', 'is-invalid' => $errors->has('address_1')])
                                    name="address_1"
                                    rows="3"
                                >{{ old('address_1', $kontak->address_1) }}</textarea>
                                <x-forms.invalid-feedback name="address_1" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Alamat 1 (EN)  <x-required-indicator /></label>
                                <textarea
                                    @class(['form-control', 'is-invalid' => $errors->has('en_address_1')])
                                    name="en_address_1"
                                    rows="3"
                                >{{ old('en_address_1', $kontak->en_address_1) }}</textarea>
                                <x-forms.invalid-feedback name="en_address_1" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Alamat 2  <x-required-indicator /></label>
                                <textarea
                                    @class(['form-control', 'is-invalid' => $errors->has('address_2')])
                                    name="address_2"
                                    rows="3"
                                >{{ old('address_2', $kontak->address_2) }}</textarea>
                                <x-forms.invalid-feedback name="address_2" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Alamat 2 (EN)  <x-required-indicator /></label>
                                <textarea
                                    @class(['form-control', 'is-invalid' => $errors->has('en_address_2')])
                                    name="en_address_2"
                                    rows="3"
                                >{{ old('en_address_2', $kontak->en_address_2) }}</textarea>
                                <x-forms.invalid-feedback name="en_address_2" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nomor Telphone  <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('phone_number')])
                                    type="text"
                                    name="phone_number"
                                    value="{{ old('phone_number', $kontak->phone_number) }}"
                                    required
                                />
                                <x-forms.invalid-feedback name="phone_number" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email  <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('email')])
                                    type="text"
                                    name="email"
                                    value="{{ old('email', $kontak->email) }}"
                                    required
                                />
                                <x-forms.invalid-feedback name="email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Gmap <x-required-indicator /></label>
                            <textarea
                                @class(['form-control', 'is-invalid' => $errors->has('gmap')])
                                name="gmap"
                                rows="5"
                            >{{ old('gmap', $kontak->gmap) }}</textarea>
                            <x-forms.invalid-feedback name="gmap" />
                        </div>
                        <div class="form-group">
                            <label>Password Konfirmasi  <x-required-indicator /></label>
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
