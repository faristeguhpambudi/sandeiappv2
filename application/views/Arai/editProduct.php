<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <!-- <div class="row">
        <div class="col-lg-12"> -->
    <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <?= $this->session->flashdata('message'); ?>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Product</a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kdBarang">Item Code</label>
                        <input type="text" class="form-control" name="kdBarang" id="kdBarang" value="<?= $product['kdBarang']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="namaProduct">Product Name</label>
                        <input type="text" class="form-control" name="namaProduct" id="namaProduct" value="<?= $product['namaProduct']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="idKain">Fabric Type</label>
                        <select name="idKain" id="idKain" class="form-control">
                            <option value="">Select Color</option>
                            <?php foreach ($kain as $k) : ?>
                                <?php if ($k['id'] == $product['idKain']) : ?>
                                    <option value="<?= $k['id']; ?>" selected><?= $k['tipeKain']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $k['id']; ?>"><?= $k['tipeKain']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="warnaKain">Color</label>
                        <select name="warnaKain" id="warnaKain" class="form-control">
                            <option value="">Select Color</option>
                            <?php foreach ($warna as $w) : ?>
                                <?php if ($w['id'] == $product['warnaKain']) : ?>
                                    <option value="<?= $w['id']; ?>" selected><?= $w['warnaKain']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $w['id']; ?>"><?= $w['warnaKain']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="lebar">Width</label>
                        <input type="text" class="form-control" name="lebar" id="lebar" value="<?= $product['lebar']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tinggi">High</label>
                        <input type="text" class="form-control" name="tinggi" id="tinggi" value="<?= $product['tinggi']; ?>">
                    </div>
                    <input type="text" class="form-control" name="id" id="id" value="<?= $product['id']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Updated</button>
                </div>
            </form>
        </div>
    </div>
    <!-- </div>
    </div> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->