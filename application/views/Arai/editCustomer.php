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
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_customer">Customer Name</label>
                            <input type="text" class="form-control" name="nama_customer" id="nama_customer" value="<?= $editC['nama_customer']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Address</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $editC['alamat']; ?>">
                            <input type="hidden" class="form-control" name="id" id="id" value="<?= $editC['id']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href=" <?= base_url('arai/'); ?>" type="button" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- </div>
    </div> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<