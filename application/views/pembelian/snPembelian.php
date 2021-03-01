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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAset">Add Serial Number</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Serial Number</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($pembelian as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['nama_barang']; ?></td>
                            <td><?= $p['sn']; ?></td>
                            <td><?= $p['qty']; ?></td>
                            <td>
                                <a href="<?= base_url('Pembelian/ubahPembeliansn/') . $p['id']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url('Pembelian/hapussn/') . $p['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin ?');">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="sn" id="sn" placeholder="Serial Number">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="qty" id="qty" placeholder="Quantity">
                    </div>
                    <input type="text" class="form-control" name="id_pembeli" id="id_pembeli" value="<?= $pembelianAll['id']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>