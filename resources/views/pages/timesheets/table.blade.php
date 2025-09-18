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
                    <a href="#" class="btn btn-primary btn-add-timesheet" data-tanggal="" data-shifting=""
                        data-jam_masuk="" data-jam_pulang="" data-total_jam_kerja="" data-status_kehadiran=""
                        data-id_user="{{ $user ?? '' }}" data-id_project="{{ $userProjects->id_project ?? '' }}"
                        data-project="{{ $userProjects->nama_project ?? '' }}"
                        data-kode_project="{{ $userProjects->kode_project ?? '' }}"
                        data-id_cluster="{{ $userProjects->id_cluster ?? '' }}"
                        data-cluster="{{ $userClusters->nama_cluster ?? '' }}" data-aplikasi="" data-kegiatan="">Add
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
                                            <th>Id</th>
                                            <th>Tanggal</th>
                                            <th>Shifting</th>
                                            <th>Jam Masuk</th>
                                            <th>Jam Pulang</th>
                                            <th>Total Jam Kerja</th>
                                            <th>Status Kehadiran</th>
                                            <th>Project</th>
                                            <th>Kode Project</th>
                                            <th>Cluster</th>
                                            <th>Aplikasi</th>
                                            <th>Kegiatan</th>
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
                                                <td>{{ $timesheet->project->nama_project }}</td>
                                                <td>{{ $timesheet->project->kode_project }}</td>
                                                <td>{{ $timesheet->cluster->nama_cluster }}</td>
                                                <td>
                                                    @if ($timesheet->aplikasis->isNotEmpty())
                                                        @foreach ($timesheet->aplikasis as $aplikasi)
                                                            <span
                                                                class="badge badge-primary">{{ $aplikasi->nama_aplikasi }}</span>
                                                        @endforeach
                                                    @else
                                                        -
                                                    @endif
                                                </td>
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
    <script>
        $(document).on('click', '.btn-add-timesheet', function() {
            var id_user = $(this).data('id_user') || 'ee';
            var id_project = $(this).data('id_project') || 'ee';
            var project = $(this).data('project') || 'ee';
            var kode_project = $(this).data('kode_project') || 'ee';
            var id_cluster = $(this).data('id_cluster') || 'ee';
            var cluster = $(this).data('cluster') || '';
            $('#add_id_user_user').val(id_user);
            $('#add_id_project_user').val(id_project);
            $('#add_project_user').val(project);
            $('#add_kode_project_user').val(kode_project);
            $('#add_id_cluster_user').val(id_cluster);
            $('#add_cluster_user').val(cluster);

            // Set action form#addNewTimesheetModal
            $('#addNewTimesheetForm').attr('action', '/timesheet');
            $('#addNewTimesheetModal').modal('show');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tanggal = document.getElementById("tanggal"); // input tanggal di atas
            const jamMasuk = document.getElementById("jam_masuk");
            const jamPulang = document.getElementById("jam_pulang");
            const totalJam = document.getElementById("total_jam_kerja");

            function formatForOracle(dateObj) {
                let yyyy = dateObj.getFullYear();
                let mm = String(dateObj.getMonth() + 1).padStart(2, '0');
                let dd = String(dateObj.getDate()).padStart(2, '0');
                let hh = String(dateObj.getHours()).padStart(2, '0');
                let mi = String(dateObj.getMinutes()).padStart(2, '0');
                let ss = String(dateObj.getSeconds()).padStart(2, '0');
                return `${yyyy}-${mm}-${dd} ${hh}:${mi}:${ss}`;
            }

            function hitungJamKerja() {
                if (tanggal.value && jamMasuk.value && jamPulang.value) {
                    // gabungkan tanggal dengan jam
                    let masuk = new Date(tanggal.value + "T" + jamMasuk.value + ":00");
                    let pulang = new Date(tanggal.value + "T" + jamPulang.value + ":00");

                    document.getElementById("jam_masuk_oracle").value = formatForOracle(masuk);
                    document.getElementById("jam_pulang_oracle").value = formatForOracle(pulang);

                    if (pulang > masuk) {
                        let diffMs = pulang - masuk;
                        let diffJam = diffMs / (1000 * 60 * 60);
                        totalJam.value = diffJam.toFixed(2) + " Jam";
                    } else {
                        totalJam.value = "Jam pulang harus lebih besar dari jam masuk!";
                    }
                }
            }

            jamMasuk.addEventListener("change", hitungJamKerja);
            jamPulang.addEventListener("change", hitungJamKerja);
        });
    </script>
@endpush
