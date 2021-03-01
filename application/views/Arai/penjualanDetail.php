<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <!-- <div class="row">
        <div class="col-lg-12"> -->
    <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <?= $this->session->flashdata('message'); ?>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add Detail Order</a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable"  -->
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Tipe Fabric</th>
                            <th scope="col">Color</th>
                            <th scope="col">width</th>
                            <th scope="col">High</th>
                            <th scope="col">Set</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detailPenjualan as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['namaProduct']; ?></td>
                                <td><?= $p['idKain']; ?></td>
                                <td><?= $p['warnaKain']; ?></td>
                                <td><?= $p['lebar']; ?></td>
                                <td><?= $p['tinggi']; ?></td>
                                <td><?= $p['jumlahSet']; ?></td>
                                <td><?= date('d F Y', $user['date_created']); ?></td>
                                <td>
                                    <a href="<?= base_url('arai/hapusPenjualanDetail/') . $p['id']; ?>" class="badge badge-warning">edit</a>
                                    <a href="<?= base_url('arai/hapusPenjualanDetail/') . $p['id']; ?>" class="badge badge-danger">delete</a>
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
                <h5 class="modal-title" id="newRoleModalLabel">Add Detail Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <input type="hidden" class="form-control" name="date_created" id="date_created" value="<?= time(); ?>">
                <input type="hidden" class="form-control" name="idPenjualan" id="idPenjualan" value="<?= $PenjualanId['id']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kdProduct">Item Code</label>
                        <!-- <input type="text" class="form-control" name="kdProduct" id="kdProduct"> -->
                        <select name="kdProduct" id="kdProduct" class="form-control">

                            <?php foreach ($product as $p) : ?>

                                <option value="<?= $p['kdProduct']; ?>"><?= $p['kdProduct']; ?>-<?= $p['namaProduct']; ?>-<?= $p['tipeKain']; ?>-<?= $p['warnaKain']; ?>-<?= $p['lebar']; ?>-<?= $p['tinggi']; ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaProduct">Product Name</label>
                        <input type="text" class="form-control" name="namaProduct" id="namaProduct">
                    </div>
                    <div class="form-group">
                        <label for="idKain">Tipe Fabric</label>
                        <input type="text" class="form-control" name="idKain" id="idKain">
                    </div>
                    <div class="form-group">
                        <label for="warnaKain">Color</label>
                        <input type="text" class="form-control" name="warnaKain" id="warnaKain">
                    </div>
                    <div class="form-group">
                        <label for="lebar">width</label>
                        <input type="text" class="form-control" name="lebar" id="lebar">
                    </div>
                    <div class="form-group">
                        <label for="tinggi">High</label>
                        <input type="text" class="form-control" name="tinggi" id="tinggi">
                    </div>
                    <div class="form-group">
                        <label for="jumlahSet">Jumlah Set</label>
                        <input type="text" class="form-control" name="jumlahSet" id="jumlahSet">
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







<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#kdProduct').on('input', function() {

            var kdProduct = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Arai/get_product') ?>",
                dataType: "JSON",
                data: {
                    kdProduct: kdProduct
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(kdProduct, namaProduct, idKain, warnaKain, lebar, tinggi) {

                        $('[name="kdProduct"]').val(data.kdProduct);
                        $('[name="namaProduct"]').val(data.namaProduct);
                        $('[name="idKain"]').val(data.idKain);
                        $('[name="warnaKain"]').val(data.warnaKain);
                        $('[name="lebar"]').val(data.lebar);
                        $('[name="tinggi"]').val(data.tinggi);

                    });

                }
            });
            return false;
        });

    });
</script>