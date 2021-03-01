<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <div class="ml-2">
        <h1 class="h3 mb-4 text-gray-800">Report By No PO</h1>
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-6 text-gray-900">
                    <div class="form-group row">
                        <label for="id" class="col-sm-4 col-form-label"><strong>Masukkan No. PO</strong></label>
                        <div class="col-sm-8">
                            <input type="text" name="noPo" id="noPo" class="form-control" placeholder="Masukkan no. po..">
                            <?= form_error('noPo', '<small class="text-danger pl-3"><strong><i>', '</i></strong></small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 text-gray-900">
                    <div class="form-group row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn btn-success"><i class="fas fa-search fa-sm mr-1"></i><strong>Cari Data!</strong></button>
                            <a href="<?= base_url('arai/cetakReportByPo'); ?>" target="_blank" class="btn btn-danger"><i class="fas fa-print fa-sm mr-1"></i><strong>Cetak Laporan!</strong></a>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <div class="row">
        <div class="col-lg">
            <?php if ($penjualan == null) : ?>
                <div class="alert alert-danger" role="alert">
                    <strong>The data you were looking for was not found.</strong>
                </div>
            <?php endif; ?>
            <?php if ($penjualan != null) : ?>
                <table class="table table-hover table-bordered text-gray-900">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">
                                <center>
                                    No.
                                </center>
                            </th>
                            <th scope="col">No. PO</th>
                            <th scope="col">
                                Toko
                            </th>
                            <th scope="col">
                                <center>Nama Produk</center>
                            </th>
                            <th scope="col">
                                <center>Type</center>
                            </th>
                            <th scope="col">
                                <center>Warna</center>
                            </th>
                            <th scope="col">
                                <center>Lebar</center>
                            </th>
                            <th scope="col">
                                <center>Tinggi</center>
                            </th>
                            <th scope="col">
                                <center>Jumlah</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($penjualan as $p) : ?>
                            <tr>
                                <th scope="row">
                                    <center>
                                        <?= $i++; ?>
                                    </center>
                                </th>
                                <td>
                                    <?= $p["noPo"]; ?>
                                </td>
                                <td>
                                    <?= $p["nama_customer"]; ?>
                                </td>
                                <td>
                                    <?= $p["namaProduct"]; ?>
                                </td>
                                <td>
                                    <?= $p["idKain"]; ?>
                                </td>
                                <td>
                                    <?= $p["warnaKain"]; ?>
                                </td>
                                <td>
                                    <?= $p["lebar"]; ?>
                                </td>
                                <td>
                                    <?= $p["tinggi"]; ?>
                                </td>
                                <td>
                                    <?= $p["jumlahSet"]; ?>
                                </td>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>


        </div>
    </div>
    <!-- /.container-fluid -->
</div>
</div>
</div>
<!-- End of Main Content -->