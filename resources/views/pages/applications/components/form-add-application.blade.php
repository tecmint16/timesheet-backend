{{-- filepath: resources/views/pages/timesheets/components/form-add-timesheet.blade.php --}}
<div class="modal fade" id="addNewApplicationModal" tabindex="-1" role="dialog"
    aria-labelledby="addNewApplicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('application.store') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewApplicationModalLabel">Add Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Application</label>
                        <input type="text" class="form-control" name="NAMA_APPLICATION" required>
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
