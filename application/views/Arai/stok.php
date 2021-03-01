<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <!-- <div class="row">
        <div class="col-lg-12"> -->
    <?= form_error('noPo', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <?= $this->session->flashdata('message'); ?>


    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Print</a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable"  -->
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Type Fabric</th>
                            <th scope="col">Type Color</th>
                            <th scope="col">Width</th>
                            <th scope="col">Hight</th>
                            <th scope="col">Stoct</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($stokArai as $sa) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $sa['namaProduct']; ?></td>
                                <td><?= $sa['tipeKain']; ?></td>
                                <td><?= $sa['warnaKain']; ?></td>
                                <td><?= $sa['lebar']; ?></td>
                                <td><?= $sa['tinggi']; ?></td>
                                <td><?= $sa['stok']; ?></td>


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