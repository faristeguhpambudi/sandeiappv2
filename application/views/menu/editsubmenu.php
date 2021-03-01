<div class="row">
    <div class="col-lg-6">
        <h3><?= $title; ?></h3>
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>

        <form action="" method="POST">
            <div class="modal-body">
                <input type="hidden" class="form-control" name="id" id="id" placeholder="Category Name" value="<?= $submenuId['id']; ?>">
                <div class="form-group">
                    <label for="menu_id">Edit Menu</label>

                    <select name="menu_id" id="menu_id" class="form-control">

                        <?php foreach ($menu as $m) : ?>
                            <?php if ($m['id'] == $submenuId['menu_id']) : ?>
                                <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                            <?php else : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Category Name" value="<?= $submenuId['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="Category Name" value="<?= $submenuId['url']; ?>">
                </div>
                <div class="form-group">
                    <label for="icon">icon</label>
                    <input type="text" class="form-control" name="icon" id="icon" placeholder="Category Name" value="<?= $submenuId['icon']; ?>">
                </div>
                <div class="form-group">
                    <label for="is_active">Is active</label>
                    <input type="text" class="form-control" name="is_active" id="is_active" placeholder="Category Name" value="<?= $submenuId['is_active']; ?>">
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    </div>
</div>