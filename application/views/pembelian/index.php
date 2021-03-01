<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?= form_error('tgl_beli', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('nama_barang', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('supplier', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('qty', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('harga', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAset">Add Asset</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Date of Purchase</th>
                        <th scope="col">Asset name</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pembelian as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= date('d F Y', $p['tgl_beli']); ?></td>
                            <td><?= $p['nama_barang']; ?></td>
                            <td><?= $p['supplier']; ?></td>
                            <td><?= $p['qty']; ?></td>
                            <td><?= $p['harga']; ?></td>
                            <td>
                                <a href="<?= base_url('Pembelian/ubahPembelian/') . $p['id']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url('Pembelian/snPembelian/') . $p['id']; ?>" class="badge badge-success">Serial Number</a>
                                <a href="<?= base_url('Pembelian/hapus/') . $p['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin ?');">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="addAset" tabindex="-1" role="dialog" aria-labelledby="addAsetLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAsetLabel">Add Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pembelian/'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tgl_beli" id="tgl_beli" value="<?= time(); ?>">
                    </div>
                    <div class=" form-group">
                        <select name="nama_barang" id="nama_barang" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($aset as $a) : ?>
                                <option value="<?= $a['nama_barang']; ?>"><?= $a['nama_barang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="supplier" id="supplier" placeholder="Supplier Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="qty" id="qty" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Price">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>