@extends('layouts.app')

@section('title', 'Cluster Table')

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
                <h1>Cluster</h1>
                <div class="section-header-button">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addNewClusterModal">Add
                        New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Cluster</a></div>
                    <div class="breadcrumb-item">Cluster Table</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Cluster Table</h4>
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
                                    <form method="GET" action="{{ route('cluster.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search"
                                                value="{{ request('search') }}">
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
                                            <th>NO</th>
                                            <th>Nama Cluster</th>
                                            <th>Action</th>
                                        </tr>
                                        @forelse ($clusters as $cluster)
                                            <tr>
                                                <td>{{ $cluster->id_cluster }}</td>
                                                <td>{{ $cluster->nama_cluster }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-edit-cluster"
                                                        data-id="{{ $cluster->id_cluster }}"
                                                        data-nama="{{ $cluster->nama_cluster }}">Edit</a>
                                                    <form action="{{ route('cluster.destroy', $cluster->id_cluster) }}"
                                                        method="POST" style="display:inline-block;"
                                                        onsubmit="return confirm('Yakin ingin menghapus cluster ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No Clusters Found.</td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </div>
                                {{-- <div class="float-right">
                                    {{ $timesheets->withQueryString()->links() }}
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('pages.clusters.components.form-add-cluster')
        @include('pages.clusters.components.form-edit-cluster')
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
        $(document).on('click', '.btn-edit-cluster', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            $('#edit_id_cluster').val(id);
            $('#edit_nama_cluster').val(nama);
            // Set action form
            $('#editClusterForm').attr('action', '/cluster/' + id);
            $('#editClusterModal').modal('show');
        });
    </script>
@endpush
