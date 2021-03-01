<div class="row">
    <div class="col-lg-6">

        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>


        <form action="" method="POST">
            <div class="modal-body">
                <input type="hidden" class="form-control" name="id" id="id" placeholder="Category Name" value="<?= $pembelian['id']; ?>">
                <div class="form-group">
                    <label for="tgl_beli">Purchase Date</label>
                    <input type="text" class="form-control" name="tgl_beli" id="tgl_beli" placeholder="Category Name" value="<?= date('d F Y', $pembelian['tgl_beli']); ?>">
                </div>
                <div class="form-group">
                    <label for="nama_barang">Item Name</label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Category Name" value="<?= $pembelian['nama_barang']; ?>">
                </div>
                <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <input type="text" class="form-control" name="supplier" id="supplier" placeholder="Category Name" value="<?= $pembelian['supplier']; ?>">
                </div>
                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="text" class="form-control" name="qty" id="qty" placeholder="Category Name" value="<?= $pembelian['qty']; ?>">
                </div>
                <div class="form-group">
                    <label for="harga">Price</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Category Name" value="<?= $pembelian['harga']; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('Pembelian/index/'); ?>" class="btn btn-secondary">Back</a>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

    </div>
</div>