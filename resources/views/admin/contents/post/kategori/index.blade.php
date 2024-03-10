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
                            <h4 class="mb-0">{{ __('Tabel Kategori') }}</h4>
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
                                    <th>Nama (EN)</th>
                                    <th>tipe</th>
                                    <th>Dibuat pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postKategori as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->en_name }}</td>
                                        <td>{{ str($row->type)->ucfirst() }}</td>
                                        <td>{{ $row->getCreatedAt() }}</td>
                                        <td>
                                            <x-forms.button-icon-edit
                                                link="{{ route('post.kategori.edit', $row->id) }}"
                                            />
                                            <x-forms.button-icon-delete
                                                link="{{ route('post.kategori.hapus', $row->id) }}"
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
                    <h5 class="modal-title fw-bold">{{ __('Tambah Kategori') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('post.kategori.simpan') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <x-required-text-label />
                        <div class="form-group">
                            <label>{{ __('Nama Kategori') }} <x-required-indicator /></label>
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
                            <label>{{ __('Nama Kategori (EN)') }} <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('en_name')])
                                type="text"
                                name="en_name"
                                value="{{ old('en_name') }}"
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
                                    <option value="{{ $value }}" @selected(old('type') == $value)>{{ str($value)->ucfirst() }}</option>
                                @endforeach
                            </select>
                            <x-forms.invalid-feedback name="type" />
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

@push('js')

    @if ($errors->all())
        <script>$('#tambahModal').modal('show');</script>
    @endif

@endpush
