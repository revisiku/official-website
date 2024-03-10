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
                            <h4 class="mb-0">{{ __('Tabel Pesan Masuk') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pengirim</th>
                                    <th>Pesan</th>
                                    <th>Status</th>
                                    <th>Dikirim pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesan as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <table class="table table-borderless mb-0">
                                                <tr>
                                                    <td class="p-2">Nama</td>
                                                    <td class="p-2">:</td>
                                                    <td class="p-2">{{ $row->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2">Email</td>
                                                    <td class="p-2">:</td>
                                                    <td class="p-2">{{ $row->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="p-2">No HP</td>
                                                    <td class="p-2">:</td>
                                                    <td class="p-2">{{ $row->handphone }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            {{ $row->subject }}
                                        </td>
                                        <td>{!! $row->getStatusHtml() !!}</td>
                                        <td>{{ $row->getCreatedAt() }}</td>
                                        <td>
                                            <x-forms.button-icon-detail
                                                link="{{ route('pesan.detail', $row->id) }}"
                                            />
                                            <x-forms.button-icon-delete
                                                link="{{ route('pesan.hapus', $row->id) }}"
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

@push('css')

@endpush

@push('js')

@endpush
