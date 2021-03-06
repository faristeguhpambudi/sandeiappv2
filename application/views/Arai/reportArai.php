<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <!-- <div class="row">
        <div class="col-lg-12"> -->
    <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <?= $this->session->flashdata('message'); ?>


    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable"  -->
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">ItemCode</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Fabric Type</th>
                            <th scope="col">Color</th>
                            <th scope="col">Width</th>
                            <th scope="col">High</th>
                            <th scope="col">Set</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($penjualan as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['idCustomer']; ?></td>
                                <td><?= $p['kdBarang']; ?></td>
                                <td><?= $p['namaProduct']; ?></td>
                                <td><?= $p['idKain']; ?></td>
                                <td><?= $p['warnaKain']; ?></td>
                                <td><?= $p['lebar']; ?></td>
                                <td><?= $p['tinggi']; ?></td>
                                <td><?= $p['jumlahSet']; ?></td>
                                <td>
                                    <a href="<?= base_url('arai/editProduct/') . $p['id']; ?>" class="badge badge-success">edit</a>
                                    <a href="<?= base_url('arai/hapusProduct/') . $p['id']; ?>" class="badge badge-danger">delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- </div>
    </div> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add Product / System</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kdBarang">Item Code</label>
                        <input type="text" class="form-control" name="kdBarang" id="kdBarang" placeholder="Item Code">
                    </div>
                    <div class="form-group">
                        <label for="namaProduct">Product Name</label>
                        <input type="text" class="form-control" name="namaProduct" id="namaProduct" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="idKain">Fabric Type</label>
                        <select name="idKain" id="idKain" class="form-control">
                            <option value="">Select Fabric</option>
                            <?php foreach ($kain as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['tipeKain']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="warnaKain">Color</label>
                        <select name="warnaKain" id="warnaKain" class="form-control">
                            <option value="">Select Color</option>
                            <?php foreach ($warna as $w) : ?>
                                <option value="<?= $w['id']; ?>"><?= $w['warnaKain']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lebar">Width</label>
                        <input type="text" class="form-control" name="lebar" id="lebar" placeholder="Width">
                    </div>
                    <div class="form-group">
                        <label for="tinggi">High</label>
                        <input type="text" class="form-control" name="tinggi" id="tinggi" placeholder="High">
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