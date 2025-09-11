{{-- Modal Edit Application --}}
<div class="modal fade" id="editApplicationModal" tabindex="-1" role="dialog" aria-labelledby="editApplicationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" id="editApplicationForm">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editApplicationModalLabel">Edit Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_application" id="edit_id_application">
                    <div class="form-group">
                        <label>Nama Application</label>
                        <input type="text" class="form-control" name="NAMA_APPLICATION" id="edit_nama_application"
                            required>
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
