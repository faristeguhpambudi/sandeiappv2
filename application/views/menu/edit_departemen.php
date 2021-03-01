<div class="row">
    <div class="col-lg-6">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>

        <form action="" method="POST">
            <div class="modal-body">
                <input type="hidden" class="form-control" name="departemen_id" departemen_id="id" placeholder="Category Name" value="<?= $departemen['departemen_id']; ?>">
                <div class="form-group">
                    <label for="nama_departemen">Departemen Name</label>
                    <input type="text" class="form-control" name="nama_departemen" id="nama_departemen" placeholder="Departemen Name" value="<?= $departemen['nama_departemen']; ?>">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    </div>
</div>