{{-- filepath: resources/views/pages/timesheets/components/form-add-timesheet.blade.php --}}
<div class="modal fade" id="addNewTimesheetModal" tabindex="-1" role="dialog" aria-labelledby="addNewTimesheetModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="">
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
                        <input type="text" class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label>Jam Masuk</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control timepicker">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jam Pulang</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control timepicker">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Shifting</label>
                        <input type="text" class="form-control" name="text">
                    </div>
                    <div class="form-group">
                        <label>Total Jam Kerja</label>
                        <input type="text" class="form-control" name="text">
                    </div>
                    <div class="form-group">
                        <label>Status Kehadiran</label>
                        <select class="form-control" name="select">
                            <option>Hadir</option>
                            <option>Alpha</option>
                            <option>Izin</option>
                            <option>Sakit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Project</label>
                        <input type="text" class="form-control" name="text">
                    </div>
                    <div class="form-group">
                        <label>Kode Project</label>
                        <input type="text" class="form-control" name="text">
                    </div>
                    <div class="form-group">
                        <label>Cluster</label>
                        <input type="text" class="form-control" name="text">
                    </div>
                    <div class="form-group">
                        <label>Aplikasi</label>
                        <select class="form-control select2" multiple="">
                            <option>Medallion</option>
                            <option>Bancs</option>
                            <option>FSCM</option>
                            <option>Kibana</option>
                            <option>Bars</option>
                            <option>Teras</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kegiatan</label>
                        <textarea class="form-control" data-height="150"></textarea>
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
