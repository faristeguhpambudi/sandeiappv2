<div class="row">
    <div class="col-lg-6">

        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>


        <form action="" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="sn">Serial Number</label>
                    <input type="text" class="form-control" name="sn" id="sn" value="<?= $pembelian['sn']; ?>">
                </div>
                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="text" class="form-control" name="qty" id="qty" value="<?= $pembelian['qty']; ?>">
                </div>
                <input type="hidden" class="form-control" name="id_pembeli" id="id_pembeli" value="<?= $pembelian['id_pembeli']; ?>">
                <input type="hidden" class="form-control" name="id" id="id" value="<?= $pembelian['id']; ?>">
            </div>

            <div class="modal-footer">
                <a href="<?= base_url('Pembelian/index/'); ?>" class="btn btn-secondary">Back</a>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    </div>
</div>
</div>