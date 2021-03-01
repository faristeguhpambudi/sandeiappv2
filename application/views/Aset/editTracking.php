<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-8">
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_tracking">Tracking Id </label>
                        <input type="text" class="form-control" name="id_tracking" id="id_tracking" value="<?= $allTrack['id_tracking']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="id_aset">Item Name</label>
                        <!-- <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $allTrack['id_aset']; ?>"> -->
                        <select name="id_aset" id="id_aset" class="form-control">

                            <?php foreach ($aset as $t) : ?>
                                <?php if ($t['id'] == $allTrack['id_aset']) : ?>
                                    <option value="<?= $t['id']; ?>" selected><?= $t['nama_barang']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $t['id']; ?>"><?= $t['nama_barang']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_karyawan">Employe</label>
                        <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="<?= $allTrack['nama_karyawan']; ?>">
                        <input type="hidden" class="form-control" name="departemen_id" id="departemen_id" value="<?= $allTrack['departemen_id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tgl_serah_terima">Handover Date</label>
                        <input type="text" class="form-control" name="tgl_serah_terima" id="tgl_serah_terima" value="<?= $allTrack['tgl_serah_terima']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tgl_buat">Date Created</label>
                        <input type="text" class="form-control" name="tgl_buat" id="tgl_buat" value="<?= date('d F y', $allTrack['tgl_buat']); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('aset/TrackingAset'); ?>" class="btn btn-secondary">Back</a>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>