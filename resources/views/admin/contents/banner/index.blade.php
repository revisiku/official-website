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
                            <h4 class="mb-0">{{ __('Tabel Banner') }}</h4>
                        </div>
                        <div class="col-md-4 d-flex justify-content-end">
                            <a
                                href="{{ route('banner.tambah') }}"
                                class="btn btn-primary btn-custom"
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
                                    <th>Banner</th>
                                    <th># Detail</th>
                                    <th>New Window</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banner as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img style="width: 200px" src="{{ asset($row->image) }}">
                                        </td>
                                        <td style="white-space: normal; max-width: 500px;">
                                            <b>{{ $row->title }}</b>
                                            <hr>
                                            {{ $row->description }}
                                            <hr>
                                            {{ $row->en_description }}
                                            <hr>
                                            Link: {{ $row->link }}
                                        </td>
                                        <td>
                                            {!! $row->getNewWindowHtml() !!}
                                        </td>
                                        <td>
                                            {!! $row->getStatusHtml() !!}
                                        </td>
                                        <td>
                                            <x-forms.button-icon-edit
                                                link="{{ route('banner.edit', $row->id) }}"
                                            />
                                            <x-forms.button-icon-delete
                                                link="{{ route('banner.hapus', $row->id) }}"
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

    <!-- Delete Modal -->
    <x-widgets.modal.delete />
@endsection
