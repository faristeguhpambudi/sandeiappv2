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

        <h2 class="text-center buatfont">
            <strong>
                <center>Report Day</center>
            </strong>
        </h2>
        <br>
        <div class="table-responsive">
            <!-- <table class="table table-bordered" id="dataTable"  -->
            <table class="table table-hover" width="100%" cellspacing="0">
                <thead>
                    <!-- foreach untuk pemanggilan tipe kain -->
                    <?php foreach ($kain as $k) : ?>

                        <tr>
                            <th><?= $k['tipeKain']; ?></th>
                            <?php
                            $idKain = $k['id'];
                            $ukuranId = " SELECT DISTINCT lebar,tinggi FROM `tbl_product` order by id
                                                ";
                            $ukuran = $this->db->query($ukuranId)->result_array();
                            ?>

                            <!-- foreach untuk pemanggilan warna kain -->
                            <?php foreach ($ukuran as $wk) : ?>

                                <th>L.<?= $wk['lebar']; ?>cm T.<?= $wk['tinggi']; ?>cm</th>

                            <?php endforeach; ?>
                            <th>Total</th>

                            <?php
                            $idKain = $k['id'];
                            $warnaKainId = " SELECT DISTINCT tbl_warnakain.warnaKain,tbl_warnakain.id  FROM tbl_product join
                                tbl_kain on tbl_product.idKain = tbl_kain.id JOIN
                                tbl_warnakain on tbl_warnakain.id = tbl_product.warnaKain WHERE tbl_warnakain.idKain=  $idKain
                                                ";
                            $warnakain = $this->db->query($warnaKainId)->result_array();
                            ?>
                            <!-- foreach untuk pemanggilan warna kain -->
                            <?php foreach ($warnakain as $wk) : ?>


                                <?php
                                $idKain = $k['tipeKain'];
                                $warnaKain = $wk['warnaKain'];
                                $ukuran45 = " SELECT * ,SUM(jumlahSet) FROM `tbl_penjualandetail` where lebar = 45  AND idKain= '$idKain' AND 
                                       warnaKain= '$warnaKain'
                                                ";
                                $ukuran45 = $this->db->query($ukuran45)->result_array();
                                ?>

                                <?php
                                $idKain = $k['tipeKain'];
                                $warnaKain = $wk['warnaKain'];
                                $ukuran60 = " SELECT * ,SUM(jumlahSet) FROM `tbl_penjualandetail` where lebar = 60  AND idKain= '$idKain' AND 
                                       warnaKain= '$warnaKain'
                                                ";
                                $ukuran60 = $this->db->query($ukuran60)->result_array();
                                ?>

                                <?php
                                $idKain = $k['tipeKain'];
                                $warnaKain = $wk['warnaKain'];
                                $ukuran75 = " SELECT * ,SUM(jumlahSet) FROM `tbl_penjualandetail` where lebar = 75  AND idKain= '$idKain' AND 
                                       warnaKain= '$warnaKain'
                                                ";
                                $ukuran75 = $this->db->query($ukuran75)->result_array();
                                ?>

                                <?php
                                $idKain = $k['tipeKain'];
                                $warnaKain = $wk['warnaKain'];
                                $ukuran90 = " SELECT * ,SUM(jumlahSet) FROM `tbl_penjualandetail` where lebar = 90  AND idKain= '$idKain' AND 
                                       warnaKain= '$warnaKain'
                                                ";
                                $ukuran90 = $this->db->query($ukuran90)->result_array();
                                ?>

                                <?php
                                $idKain = $k['tipeKain'];
                                $warnaKain = $wk['warnaKain'];
                                $ukuran105 = " SELECT * ,SUM(jumlahSet) FROM `tbl_penjualandetail` where lebar = 105  AND idKain= '$idKain' AND 
                                       warnaKain= '$warnaKain'
                                                ";
                                $ukuran105 = $this->db->query($ukuran105)->result_array();
                                ?>

                                <?php
                                $idKain = $k['tipeKain'];
                                $warnaKain = $wk['warnaKain'];
                                $ukuran120 = " SELECT * ,SUM(jumlahSet) FROM `tbl_penjualandetail` where lebar = 120  AND idKain= '$idKain' AND 
                                       warnaKain= '$warnaKain'
                                                ";
                                $ukuran120 = $this->db->query($ukuran120)->result_array();
                                ?>

                                <?php
                                $idKain = $k['tipeKain'];
                                $warnaKain = $wk['id'];
                                $total = " SELECT * ,SUM(jumlahSet) as total FROM `tbl_penjualandetail` join tbl_product on 
                                    tbl_penjualandetail.kdProduct = tbl_product.kdProduct where tbl_product.warnaKain = $warnaKain
                                       
                                                ";
                                $total = $this->db->query($total)->result_array();
                                ?>
                        <tr>
                            <!-- foreach untuk pemanggilan warna kain -->
                            <?php foreach ($ukuran45 as $ud) : ?>
                                <td><?= $wk['warnaKain']; ?></td>
                                <td><?= $ud['jumlahSet']; ?></td>
                            <?php endforeach; ?>

                            <?php foreach ($ukuran60 as $ud60) : ?>
                                <td><?= $ud60['jumlahSet']; ?></td>
                            <?php endforeach; ?>

                            <?php foreach ($ukuran75 as $ud75) : ?>
                                <td><?= $ud75['jumlahSet']; ?></td>
                            <?php endforeach; ?>

                            <?php foreach ($ukuran90 as $ud90) : ?>
                                <td><?= $ud90['jumlahSet']; ?></td>
                            <?php endforeach; ?>

                            <?php foreach ($ukuran105 as $uk105) : ?>
                                <td><?= $uk105['jumlahSet']; ?></td>
                            <?php endforeach; ?>

                            <?php foreach ($ukuran120 as $uk120) : ?>
                                <td><?= $uk120['jumlahSet']; ?></td>
                            <?php endforeach; ?>

                            <?php foreach ($total as $t) : ?>
                                <td><?= $t['total']; ?></td>
                            <?php endforeach; ?>


                        <?php endforeach; ?>
                        <!-- tutup foreach untuk pemanggilan warna kain -->

                        </tr>

                        </tr>
                    <?php endforeach; ?>
                    <!-- tutup foreach untuk pemanggilan tipe kain -->
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</body>

</html>