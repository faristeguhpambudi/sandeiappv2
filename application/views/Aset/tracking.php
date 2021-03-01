<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?= form_error('id_aset', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('departemen_id', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('nama_karyawan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('tgl_serah_terima', '<div class="alert alert-danger" role="alert">', '</div>'); ?>


            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewCategory">Add New Tracking</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Tracking</th>
                        <th scope="col">Id Asset</th>
                        <th scope="col">Departement</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date of receipt</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($allTrack as $t) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $t['id_tracking']; ?></td>
                            <td><?= $t['nama_barang']; ?></td>
                            <td><?= $t['nama_departemen']; ?></td>
                            <td><?= $t['nama_karyawan']; ?></td>
                            <td><?= $t['tgl_serah_terima']; ?></td>
                            <td><?= date('d F Y', $t['tgl_buat']); ?></td>
                            <td>
                                <a href="<?= base_url('aset/UpdateTracking/') . $t['id_tracking']; ?>" class="badge badge-success">edit</a>
                                <a href="<?= base_url('aset/hapusTracking/') . $t['id_tracking']; ?>" class="badge badge-danger" onclick="return confirm('yakin ?');">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Button trigger modal / buat new menu -->


<!-- Modal New Tracking -->
<div class="modal fade" id="NewCategory" tabindex="-1" role="dialog" aria-labelledby="NewCategoryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewCategoryLabel">Add New Tracking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Aset/TrackingAset'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_aset">Item Name</label>
                        <select name="id_aset" id="id_aset" class="form-control">
                            <option value="<?= set_value('nama_barang'); ?>">Select Menu</option>
                            <?php foreach ($aset as $a) : ?>
                                <option value="<?= $a['id']; ?>"><?= $a['nama_barang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="departemen_id">Departement</label>
                        <select name="departemen_id" id="departemen_id" class="form-control">
                            <option value="<?= set_value('nama_departemen'); ?>">Select Menu</option>
                            <?php foreach ($departemen as $d) : ?>
                                <option value="<?= $d['departemen_id']; ?>"><?= $d['nama_departemen']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_karyawan">Employe Name</label>
                        <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Employe Name" value="<?= set_value('nama_karyawan'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="tgl_serah_terima">Handover Date </label>
                        <input type="date" class="form-control" name="tgl_serah_terima" id="tgl_serah_terima" placeholder="Handover Date" value="<?= time(); ?>">
                    </div>
                    <input type="hidden" class="form-control" name="tgl_buat" id="tgl_buat" value="<?= time(); ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tutup New Tracking -->