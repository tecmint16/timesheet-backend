{{-- filepath: resources/views/pages/timesheets/components/form-add-timesheet.blade.php --}}
<div class="modal fade" id="addNewClusterModal" tabindex="-1" role="dialog" aria-labelledby="addNewClusterModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('cluster.store') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewClusterModalLabel">Add Cluster</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Cluster</label>
                        <input type="text" class="form-control" name="NAMA_CLUSTER" required>
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
