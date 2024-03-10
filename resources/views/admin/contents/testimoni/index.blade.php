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
        <!-- table card-1 start -->
        <div class="col-md-12">
            <x-widgets.flash-message />
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 my-auto">
                            <h4 class="mb-0">{{ __('Tabel Testimoni') }}</h4>
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
                                    <th>Gambar</th>
                                    <th>Narsum</th>
                                    <th>Isi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimoni as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img style="width: 150px" src="{{ asset($row->image) }}">
                                        </td>
                                        <td>
                                            <b>{{ $row->people_name }}</b> <br>
                                            {{ $row->people_jobs }}
                                        </td>
                                        <td style="white-space: normal">
                                            {{ $row->body }}
                                            <hr>
                                            {{ $row->en_body }}
                                        </td>
                                        <td>{!! $row->getStatusHtml() !!}</td>
                                        <td>
                                            <x-forms.button-icon-edit
                                                link="{{ route('testimoni.edit', $row->id) }}"
                                            />
                                            <x-forms.button-icon-delete
                                                link="{{ route('testimoni.hapus', $row->id) }}"
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
        <!-- table card-1 end -->
    </div>
    <!-- [ Main Content ] end -->

    <div class="modal fade" id="tambahModal" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">{{ __('Tambah Testimoni') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('testimoni.simpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <x-required-text-label />
                        <div class="form-group">
                            <label>{{ __('Foto') }} <x-required-indicator /></label>
                            <input
                                @class(['form-control', 'is-invalid' => $errors->has('image')])
                                type="file"
                                @style(['line-height: 20px'])
                                name="image"
                                required
                            />
                            <x-forms.invalid-feedback name="image" />
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('Nama') }} <x-required-indicator /></label>
                                <input
                                    @class(['form-control', 'is-invalid' => $errors->has('people_name')])
                                    type="text"
                                    name="people_name"
                                    value="{{ old('people_name') }}"
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
                                    value="{{ old('people_jobs') }}"
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
                                >{{ old('body') }}</textarea>
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
                                >{{ old('en_body') }}</textarea>
                                <x-forms.invalid-feedback name="en_body" />
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

@push('js')

    @if ($errors->all())
        <script>$('#tambahModal').modal('show');</script>
    @endif

@endpush
