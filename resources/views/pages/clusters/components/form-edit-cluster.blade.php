{{-- Modal Edit Cluster --}}
<div class="modal fade" id="editClusterModal" tabindex="-1" role="dialog" aria-labelledby="editClusterModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" id="editClusterForm">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editClusterModalLabel">Edit Cluster</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_cluster" id="edit_id_cluster">
                    <div class="form-group">
                        <label>Nama Cluster</label>
                        <input type="text" class="form-control" name="NAMA_CLUSTER" id="edit_nama_cluster" required>
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
