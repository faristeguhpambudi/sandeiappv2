<!DOCTYPE html>
<html lang="en">

<head>

    <title><?= $judulHalaman; ?></title>
    <!-- Custom styles for this template-->
    <!-- <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?= base_url('assets/'); ?>css/font.css" rel="stylesheet">
</head>

<body>
    <!-- Begin Page Content -->
    <div class="container-fluid mt-4">
        <br>
        <!-- <table style="width: 100%;" class="pl-3 ml-3">
            <tr>
                <td>
                    <span style="line-height: 1.6; font-weight: bold;">
                    </span>
                </td>
            </tr>
        </table> -->
        <br>
        <hr>
        <h2 class="text-center buatfont">
            <strong>
                <center>Laporan PO</center>
            </strong>
        </h2>
        <br>
        <div class="ml-2">
            <div class="row">
                <div class="col-lg">
                    <h3>Type : <?= $penjualan[0]["noPo"]; ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary text-white buatfont">
                            <tr>
                                <th scope="col">
                                    <center>
                                        No.
                                    </center>
                                </th>
                                <th scope="col">No. PO</th>
                                <th scope="col">
                                    <center>Toko</center>
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
                        <tbody class="buatfont">
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
                                        <center>
                                            <?= $p["nama_customer"]; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?= $p["namaProduct"]; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?= $p["idKain"]; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?= $p["warnaKain"]; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?= $p["lebar"]; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?= $p["tinggi"]; ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?= $p["jumlahSet"]; ?>
                                        </center>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
</body>

</html>