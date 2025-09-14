{{-- Modal Edit User --}}
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" id="editUserForm">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_user" id="edit_id_user">

                    <div class="form-group">
                        <label>Nama</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="NAMA_USER" id="edit_name_user" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="EMAIL_USER" id="edit_email_user" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="PHONE_USER" id="edit_phone_user" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Project</label>
                        <select class="form-control" name="id_project" id="edit_id_project_user">
                            <option value="">Pilih Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id_project }}"
                                    {{ old('id_project', $user->id_project) == $project->id_project ? 'selected' : '' }}>
                                    {{ $project->nama_project }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Cluster</label>
                        <select class="form-control" name="id_cluster" id="edit_id_cluster_user">
                            <option value="">Pilih Cluster</option>
                            @foreach ($clusters as $cluster)
                                <option value="{{ $cluster->id_cluster }}"
                                    {{ old('id_cluster', $user->id_cluster) == $cluster->id_cluster ? 'selected' : '' }}>
                                    {{ $cluster->nama_cluster }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Aplikasi</label>
                        <select class="form-control select2" name="aplikasi_ids[]" id="edit_aplikasi_ids[]_user"
                            multiple>
                            @foreach ($applications as $application)
                                <option value="{{ $application->id_aplikasi }}">{{ $application->nama_aplikasi }}
                                </option>
                            @endforeach
                        </select>
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
