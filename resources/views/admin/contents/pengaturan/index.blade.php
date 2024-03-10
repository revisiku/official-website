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
        <div class="col-md-8">
            <x-widgets.flash-message />
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pengaturan.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>{{ __('Favicon') }}</label>
                            <div class="input-group">
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('favicon')])
                                    type="file"
                                    @style(['line-height: 20px'])
                                    name="favicon"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        data-target="#faviconModal"
                                    >
                                        <i class="fa fa-eye pt-1"></i>
                                    </button>
                                </div>
                                <x-forms.invalid-feedback name="favicon" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Logo') }}</label>
                                <div class="input-group">
                                    <input
                                        @class(['form-control', 'is-invalid' => $errors->has('logo')])
                                        type="file"
                                        @style(['line-height: 20px'])
                                        name="logo"
                                    />
                                    <div class="input-group-append">
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                            data-toggle="modal"
                                            data-target="#logoModal"
                                        >
                                            <i class="fa fa-eye pt-1"></i>
                                        </button>
                                    </div>
                                    <x-forms.invalid-feedback name="logo" />
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Logo 2') }}</label>
                                <div class="input-group">
                                    <input
                                        @class(['form-control', 'is-invalid' => $errors->has('logo_2')])
                                        type="file"
                                        @style(['line-height: 20px'])
                                        name="logo_2"
                                    />
                                    <div class="input-group-append">
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                            data-toggle="modal"
                                            data-target="#logo_2Modal"
                                        >
                                            <i class="fa fa-eye pt-1"></i>
                                        </button>
                                    </div>
                                    <x-forms.invalid-feedback name="logo_2" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Nama Website') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('site_name')])
                                    type="text"
                                    name="site_name"
                                    value="{{ old('site_name', $site_name) }}"
                                    required
                                />
                                <x-forms.invalid-feedback name="site_name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('Tag Website') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('tag')])
                                    type="text"
                                    name="tag"
                                    value="{{ old('tag', $tag) }}"
                                    required
                                />
                                <x-forms.invalid-feedback name="tag" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Footer Copyright') }} <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('footer_copyright')])
                                type="text"
                                name="footer_copyright"
                                value="{{ old('footer_copyright', $footer_copyright) }}"
                                required
                            />
                            <x-forms.invalid-feedback name="footer_copyright" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Animasi Navbar') }} <x-required-indicator /></label>
                            <textarea
                                @class(['form-control', 'is-invalid' => $errors->has('nav_animation_text')])
                                type="text"
                                name="nav_animation_text"
                                required
                            >{{ old('nav_animation_text', $nav_animation_text) }}</textarea>
                            <x-forms.invalid-feedback name="nav_animation_text" />
                        </div>
                        <div class="form-group">
                            <label>{{ __('Password Konfirmasi') }} <x-required-indicator /></label>
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

    <div class="modal fade" id="faviconModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fw-bold">{{ __('Favicon') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <img width="100" src="{{ asset($favicon) }}" alt="Favicon">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="logoModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fw-bold">{{ __('Logo') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <img width="300" src="{{ asset($logo) }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="logo_2Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fw-bold">{{ __('Logo 2') }}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center" style="background-color: gray">
                    <img width="300" src="{{ asset($logo_2) }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')

@endpush

@push('js')

@endpush
