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
                    <form action="{{ route('gantiPassword.ubah') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-required-text-label />
                        <div class="form-group">
                            <label>Password Saat Ini <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('current_password')])
                                type="password"
                                name="current_password"
                                required
                            />
                            <x-forms.invalid-feedback name="current_password" />
                        </div>
                        <div class="form-group">
                            <label>Password Baru <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('new_password')])
                                type="password"
                                name="new_password"
                                required
                            />
                            <div id="feedback-new" class="invalid-feedback">
                                @error('new_password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ulangi Password Baru <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('retype_new_password')])
                                type="password"
                                name="retype_new_password"
                                required
                            />
                            <div id="feedback-retype" class="invalid-feedback">
                                @error('retype_new_password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-0">
                            <button type="submit" class="btn btn-primary btn-custom">
                                <i class="fa fa-save mr-1"></i> {{ __('Ganti Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
@endsection

@push('js')
    <script>
        let newPass = $('form [name=new_password]')
        let retype = $('form [name=retype_new_password]')

        newPass.on('keyup', function() {
            if (this.value.length < 6) {
                $('#feedback-new').html('Input Password Baru harus minimal 6 karakter.');
                $(this).addClass('is-invalid');
            } else {
                $('#feedback-new').html('');
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
            }
        });

        retype.on('keyup', function() {
            if (newPass.val() === '') {
                $('#feedback-retype').html('Input Password Baru kosong.');
                $(this).addClass('is-invalid');
            } else if (this.value !== newPass.val()) {
                $('#feedback-retype').html('Ulangi Password Baru tidak sama.');
                $(this).addClass('is-invalid');
            } else {
                $('#feedback-retype').html('');
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
            }
        });
    </script>
@endpush
