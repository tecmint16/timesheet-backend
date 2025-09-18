{{-- filepath: resources/views/pages/timesheets/components/form-add-timesheet.blade.php --}}
<div class="modal fade" id="addNewTimesheetModal" tabindex="-1" role="dialog" aria-labelledby="addNewTimesheetModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('timesheet.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewTimesheetModalLabel">Add Timesheet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label>Jam Masuk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" required>
                        </div>
                    </div>
                    <input type="hidden" id="jam_masuk_oracle" name="jam_masuk_oracle">
                    <div class="form-group">
                        <label>Jam Pulang</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <input type="time" class="form-control" id="jam_pulang" name="jam_pulang" required>
                        </div>
                    </div>
                    <input type="hidden" id="jam_pulang_oracle" name="jam_pulang_oracle">
                    <div class="form-group">
                        <label>Shifting</label>
                        <select class="form-control" name="shifting" id="shifting" required>
                            <option value="1">Shift 1</option>
                            <option value="2">Shift 2</option>
                            <option value="3">Shift 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Total Jam Kerja</label>
                        <input type="text" class="form-control" id="total_jam_kerja" name="total_jam_kerja" readonly
                            required>
                    </div>
                    <div class="form-group">
                        <label>Status Kehadiran</label>
                        <select class="form-control" name="status_kehadiran" id="status_kehadiran" required>
                            <option value="Hadir">Hadir</option>
                            <option value="Alpha">Alpha</option>
                            <option value="Izin">Izin</option>
                            <option value="Sakit">Sakit</option>
                        </select>
                    </div>
                    <input type="hidden" id="add_id_user_user" name="id_user" required>
                    <input type="hidden" id="add_id_project_user" name="id_project" required>
                    <div class="form-group">
                        <label>Project</label>
                        <input type="text" class="form-control" name="project" id="add_project_user" readonly>
                    </div>
                    <div class="form-group">
                        <label>Kode Project</label>
                        <input type="text" class="form-control" name="kode_project" id="add_kode_project_user"
                            readonly>
                    </div>
                    <input type="hidden" id="add_id_cluster_user" name="id_cluster" required>
                    <div class="form-group">
                        <label>Cluster</label>
                        <input type="text" class="form-control" name="cluster" id="add_cluster_user" readonly>
                    </div>
                    <div class="form-group">
                        <label>Aplikasi</label>
                        <select name="aplikasi" class="form-control" required>
                            @foreach (Auth::user()->aplikasis as $aplikasi)
                                <option value="{{ $aplikasi->id_aplikasi }}">{{ $aplikasi->nama_aplikasi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kegiatan</label>
                        <textarea class="form-control" data-height="150" name="kegiatan" id="kegiatan" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
