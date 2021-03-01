<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-8">
            <form action="" method="post">
                <input type="hidden" class="form-control" name="id" id="id" value="<?= $aset['id']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_barang">New Menu</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $aset['nama_barang']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('aset/index/'); ?>" class="btn btn-secondary">Back</a>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>