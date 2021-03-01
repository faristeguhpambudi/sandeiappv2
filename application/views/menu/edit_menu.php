<div class="row">
    <div class="col-lg-6">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>

        <form action="" method="POST">
            <div class="modal-body">
                <input type="hidden" class="form-control" name="id" id="id" placeholder="Category Name" value="<?= $menu['id']; ?>">
                <div class="form-group">
                    <label for="menu">Edit Menu</label>
                    <input type="text" class="form-control" name="menu" id="menu" placeholder="Category Name" value="<?= $menu['menu']; ?>">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    </div>
</div>