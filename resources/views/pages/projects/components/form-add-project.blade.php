{{-- filepath: resources/views/pages/timesheets/components/form-add-timesheet.blade.php --}}
<div class="modal fade" id="addNewProjectModal" tabindex="-1" role="dialog" aria-labelledby="addNewProjectModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('project.store') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewProjectModalLabel">Add Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Project</label>
                        <input type="text" class="form-control" name="KODE_PROJECT" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Project</label>
                        <input type="text" class="form-control" name="NAMA_PROJECT" required>
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
