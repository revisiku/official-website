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
    <div class="row">
        <!-- table start -->
        <div class="col-md-12">
            <x-widgets.flash-message />
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 my-auto">
                            <h4 class="mb-0">{{ __('Tabel Akun') }}</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a
                                href="js:;"
                                class="btn btn-primary btn-custom"
                                data-toggle="modal"
                                data-target="#tambahModal"
                            >
                                <i class="fa fa-plus mr-1"></i> {{ __('Tambah') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Dibuat pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($akun as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->username }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{!! $row->getStatusHtml() !!}</td>
                                        <td>{{ $row->getCreatedAt() }}</td>
                                        <td>
                                            <x-forms.button-icon-edit
                                                link="{{ route('akun.edit', $row->id) }}"
                                            />
                                            <x-forms.button-icon-delete
                                                link="{{ route('akun.hapus', $row->id) }}"
                                            />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- table end -->
    </div>
    <!-- [ Main Content ] end -->

    <div class="modal fade" id="tambahModal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">{{ __('Tambah Akun') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('akun.simpan') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <x-required-text-label />
                        <div class="form-group">
                            <label>{{ __('Nama') }} <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('name')])
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
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
                                value="{{ old('email') }}"
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
                                    value="{{ old('username') }}"
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-dark btn-custom">
                            <i class="fa fa-times mr-1"></i> {{ __('Batal') }}
                        </button>
                        <button type="submit" class="btn btn-primary btn-custom">
                            <i class="fa fa-save mr-1"></i> {{ __('Simpan') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <x-widgets.modal.delete />

@endsection

@push('script')

    @if ($errors->all())
        <script>$('#tambahModal').modal('show');</script>
    @endif

@endpush
