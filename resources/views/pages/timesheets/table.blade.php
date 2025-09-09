@extends('layouts.app')

@section('title', 'Timesheet Tabel')

@push('style')
    <!-- CSS Libraries --><!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Timesheet</h1>
                <div class="section-header-button">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addNewTimesheetModal">Add
                        New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Timesheet</a></div>
                    <div class="breadcrumb-item">Timesheet Table</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Timesheet Table</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('timesheet.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="id">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>ID</th>
                                            <th>TANGGAL</th>
                                            <th>SHIFTING</th>
                                            <th>JAM MASUK</th>
                                            <th>JAM PULANG</th>
                                            <th>TOTAL JAM KERJA</th>
                                            <th>STATUS KEHADIRAN</th>
                                            <th>PROJECT</th>
                                            <th>KODE PROJECT</th>
                                            <th>CLUSTER</th>
                                            <th>APLIKASI</th>
                                            <th>KEGIATAN</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($timesheets as $timesheet)
                                            <tr>
                                                <td>{{ $timesheet->id }}</td>
                                                <td>{{ $timesheet->tanggal }}</td>
                                                <td>{{ $timesheet->shifting }}</td>
                                                <td>{{ $timesheet->jam_masuk }}</td>
                                                <td>{{ $timesheet->jam_pulang }}</td>
                                                <td>{{ $timesheet->total_jam_kerja }}</td>
                                                <td>{{ $timesheet->status_kehadiran }}</td>
                                                <td>{{ $timesheet->project }}</td>
                                                <td>{{ $timesheet->kode_project }}</td>
                                                <td>{{ $timesheet->cluster }}</td>
                                                <td>{{ $timesheet->aplikasi }}</td>
                                                <td>{{ $timesheet->kegiatan }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Edit</a>
                                                    <a href="#" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $timesheets->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('pages.timesheets.components.form-add-timesheet')
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
