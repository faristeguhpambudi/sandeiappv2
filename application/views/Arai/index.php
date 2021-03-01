<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <!-- <div class="row">
        <div class="col-lg-12"> -->
    <?= form_error('noPo', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <?= $this->session->flashdata('message'); ?>


    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">Add New Customer</a>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <!-- <table class="table table-bordered" id="dataTable"  -->
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($customer as $c) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $c['nama_customer']; ?></td>
                                <td><?= $c['alamat']; ?></td>
                                <td><?= date('d F Y', $user['date_created']); ?></td>

                                <td>
                                    <a href="<?= base_url('arai/editCustomer/') . $c['id']; ?>" class="badge badge-warning">edit</a>
                                    <a href="<?= base_url('arai/hapusCustomer/') . $c['id']; ?>" class="badge badge-danger">delete</a>
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
                <h5 class="modal-title" id="newRoleModalLabel">Add New Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <input type="hidden" class="form-control" name="date_created" id="date_created" value="<?= time(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_customer">Customer Name</label>
                        <input type="text" class="form-control" name="nama_customer" id="nama_customer" placeholder="Customer Name">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Customer Name</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Address">
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