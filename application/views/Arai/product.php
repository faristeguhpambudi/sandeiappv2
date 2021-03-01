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
            <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable"  -->
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ItemCode</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Fabric Type</th>
                            <th scope="col">Color</th>
                            <th scope="col">Width</th>
                            <th scope="col">High</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($product as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['kdProduct']; ?></td>
                                <td><?= $p['namaProduct']; ?></td>
                                <td><?= $p['tipeKain']; ?></td>
                                <td><?= $p['warnaKain']; ?></td>
                                <td><?= $p['lebar']; ?></td>
                                <td><?= $p['tinggi']; ?></td>
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


<!-- Button trigger modal / buat new menu -->


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
                        <label for="kdProduct">Item Code</label>
                        <input type="text" class="form-control" name="kdProduct" id="kdProduct" placeholder="Item Code">
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
                            <!-- <?php foreach ($warna as $w) : ?>
                               <option value="<?= $w['id']; ?>"><?= $w['warnaKain']; ?></option> -->
                        <?php endforeach; ?> -->
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
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#idKain').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('arai/get_sub_product'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].idKain + '>' + data[i].warnaKain + '</option>';
                    }
                    $('#warnaKain').html(html);

                }
            });
            return false;
        });

    });
</script>