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
                            <label for="noPo">PO Number</label>
                            <input type="text" class="form-control" name="noPo" id="noPo" value="<?= $PenjualanId['noPo']; ?>">
                        </div>
                        <label for="idCustomer">Customer Name</label>
                        <select name="idCustomer" id="idCustomer" class="form-control">
                            <option value="">Select Customer</option>
                            <?php foreach ($customer as $c) : ?>
                                <?php if ($c['id'] == $PenjualanId['idCustomer']) : ?>
                                    <option value="<?= $c['id']; ?>" selected><?= $c['nama_customer']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $c['id']; ?>"><?= $c['nama_customer']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" class="form-control" name="id" id="id" value="<?= $PenjualanId['id']; ?>">

                    </div>
                    <div class="modal-footer">
                        <a href=" <?= base_url('arai/order'); ?>" type="button" class="btn btn-secondary">Back</a>
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