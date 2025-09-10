{{-- Modal Edit Project --}}
<div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" id="editProjectForm">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProjectModalLabel">Edit Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_project" id="edit_id_project">
                    <div class="form-group">
                        <label>Kode Project</label>
                        <input type="text" class="form-control" name="KODE_PROJECT" id="edit_kode_project" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Project</label>
                        <input type="text" class="form-control" name="NAMA_PROJECT" id="edit_nama_project" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
