<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arai_model extends CI_Model
{
    public function tampil_customer()
    {
        return $this->db->get('tbl_customer')->result_array();
    }



    public function tambahCustomer()
    {
        $data = [

            "nama_customer" => $this->input->post('nama_customer', true),
            "alamat" => $this->input->post('alamat', true)
        ];

        $this->db->insert('tbl_customer', $data);
    }

    public function editCustomer()
    {
        $data = [

            "id" => $this->input->post('id', true),
            "nama_customer" => $this->input->post('nama_customer', true),
            "alamat" => $this->input->post('alamat', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_customer', $data);
    }

    public function hapusCustomer($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_customer');
    }

    public function customerId($id)
    {
        return $this->db->get_where('tbl_customer', ['id' => $id])->row_array();
    }


    // PRODUCT ARAI

    public function tampilProduct()
    {
        return $this->db->get('tbl_product')->result_array();
    }

    public function tampilALL()
    {
        $query = "SELECT * FROM tbl_product join
        tbl_kain on tbl_product.idKain = tbl_kain.id JOIN
        tbl_warnakain on tbl_warnakain.id = tbl_product.warnaKain order by tbl_product.id DESC";

        return $this->db->query($query)->result_array();
    }

    function get_Product()
    {
        $query = $this->db->get('tbl_kain');
        return $query;
    }



    function get_sub_Product($idKain)
    {
        $query = $this->db->get_where('tbl_warnaKain', array('idKain' => $idKain));
        return $query;
    }



    public function tambahProduct()
    {
        $data = [
            "kdBarang" => $this->input->post('kdBarang', true),
            "namaProduct" => $this->input->post('namaProduct', true),
            "idKain" => $this->input->post('idKain', true),
            "warnaKain" => $this->input->post('warnaKain', true),
            "tinggi" => $this->input->post('tinggi', true),
            "lebar" => $this->input->post('lebar', true)
        ];

        $this->db->insert('tbl_product', $data);
    }

    public function editProduct()
    {
        $data = [
            "kdBarang" => $this->input->post('kdBarang', true),
            "namaProduct" => $this->input->post('namaProduct', true),
            "idKain" => $this->input->post('idKain', true),
            "warnaKain" => $this->input->post('warnaKain', true),
            "tinggi" => $this->input->post('tinggi', true),
            "lebar" => $this->input->post('lebar', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_product', $data);
    }


    // Tipe Kain

    public function tampilKain()
    {
        return $this->db->get('tbl_kain')->result_array();
    }

    public function tampilWarnaKain()
    {
        return $this->db->get('tbl_warnakain')->result_array();
    }


    public function hapusProduct($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_product');
    }


    public function Product($id)
    {
        return $this->db->get_where('tbl_product', ['id' => $id])->row_array();
    }

    public function get_product_bykode($kode)
    {
        $hsl = $this->db->query("SELECT * FROM tbl_product join
        tbl_kain on tbl_product.idKain = tbl_kain.id JOIN
        tbl_warnakain on tbl_warnakain.id = tbl_product.warnaKain WHERE tbl_product.kdProduct='$kode'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'kdProduct' => $data->kdProduct,
                    'namaProduct' => $data->namaProduct,
                    'idKain' => $data->tipeKain,
                    'warnaKain' => $data->warnaKain,
                    'lebar' => $data->lebar,
                    'tinggi' => $data->tinggi
                );
            }
        }
        return $hasil;
    }


    //report Arai

    public function reportArai()
    {
        return $this->db->get('tbl_penjualanarai')->result_array();
    }

    //report Arai

    public function reportFabric()
    {
        $query = " SELECT * from tbl_penjualanarai join tbl_customer on
       tbl_penjualanarai.idCustomer = tbl_customer.id join
       tbl_penjualandetail on tbl_penjualandetail.idPenjualan = tbl_penjualanarai.id ";

        return $this->db->query($query)->result_array();
    }

    //report per Toko tanpa cari
    public function reportBerdasarkanToko()
    {
        //buat query
        $query = "SELECT `tbl_penjualanarai`.*, `tbl_customer`.*,`tbl_penjualandetail`.*
                     FROM `tbl_penjualanarai` 
                     JOIN `tbl_customer` ON `tbl_penjualanarai`.`idCustomer` = `tbl_customer`.`id`
                     JOIN `tbl_penjualandetail` ON `tbl_penjualanarai`.`id` = `tbl_penjualandetail`.`idPenjualan`
                     ORDER BY `tbl_customer`.`nama_customer` ASC
         ";

        //jalanin query
        return $this->db->query($query)->result_array();
    }

    //report per Toko dengan cari
    public function reportBerdasarkanToko2($idToko)
    {
        //buat query
        $query = "SELECT `tbl_penjualanarai`.*, `tbl_customer`.*,`tbl_penjualandetail`.*
                     FROM `tbl_penjualanarai` 
                     JOIN `tbl_customer` ON `tbl_penjualanarai`.`idCustomer` = `tbl_customer`.`id`
                     JOIN `tbl_penjualandetail` ON `tbl_penjualanarai`.`id` = `tbl_penjualandetail`.`idPenjualan`
                     WHERE `tbl_customer`.`id` = $idToko
                     ORDER BY `tbl_penjualanarai`.`date_created` ASC
         ";

        //jalanin query
        return $this->db->query($query)->result_array();
    }

    //report per PO tanpa cari
    public function reportBerdasarkanPO()
    {
        //buat query
        $query = "SELECT `tbl_penjualanarai`.*, `tbl_customer`.*,`tbl_penjualandetail`.*
                     FROM `tbl_penjualanarai` 
                     JOIN `tbl_customer` ON `tbl_penjualanarai`.`idCustomer` = `tbl_customer`.`id`
                     JOIN `tbl_penjualandetail` ON `tbl_penjualanarai`.`id` = `tbl_penjualandetail`.`idPenjualan`
                     ORDER BY `tbl_penjualanarai`.`noPo` ASC
         ";

        //jalanin query
        return $this->db->query($query)->result_array();
    }

    //report per PO dengan cari
    public function reportBerdasarkanPO2($po)
    {
        //buat query
        $query = "SELECT `tbl_penjualanarai`.*, `tbl_customer`.*,`tbl_penjualandetail`.*
                     FROM `tbl_penjualanarai` 
                     JOIN `tbl_customer` ON `tbl_penjualanarai`.`idCustomer` = `tbl_customer`.`id`
                     JOIN `tbl_penjualandetail` ON `tbl_penjualanarai`.`id` = `tbl_penjualandetail`.`idPenjualan`
                     WHERE `tbl_penjualanarai`.`noPo` = $po
                     ORDER BY `tbl_penjualanarai`.`date_created` ASC
         ";

        //jalanin query
        return $this->db->query($query)->result_array();
    }


    //report per Type tanpa cari
    public function reportBerdasarkanType()
    {
        //buat query
        $query = "SELECT `tbl_penjualanarai`.*, `tbl_customer`.*,`tbl_penjualandetail`.*
                     FROM `tbl_penjualanarai` 
                     JOIN `tbl_customer` ON `tbl_penjualanarai`.`idCustomer` = `tbl_customer`.`id`
                     JOIN `tbl_penjualandetail` ON `tbl_penjualanarai`.`id` = `tbl_penjualandetail`.`idPenjualan`
                     ORDER BY `tbl_penjualandetail`.`idKain` ASC
         ";

        //jalanin query
        return $this->db->query($query)->result_array();
    }

    //report per Type dengan cari
    public function reportBerdasarkanType2($type)
    {
        //buat query
        $query = "SELECT `tbl_penjualanarai`.*, `tbl_customer`.*,`tbl_penjualandetail`.*
                     FROM `tbl_penjualanarai` 
                     JOIN `tbl_customer` ON `tbl_penjualanarai`.`idCustomer` = `tbl_customer`.`id`
                     JOIN `tbl_penjualandetail` ON `tbl_penjualanarai`.`id` = `tbl_penjualandetail`.`idPenjualan`
                     WHERE `tbl_penjualandetail`.`idKain` = '$type'
                     ORDER BY `tbl_penjualanarai`.`date_created` ASC
         ";

        //jalanin query
        return $this->db->query($query)->result_array();
    }

    //GET ALL DATA TOKO
    public function getAllToko()
    {
        return $this->db->get('tbl_customer')->result_array();
    }

    //GET ALL DATA KAIN
    public function getAllType()
    {
        return $this->db->get('tbl_kain')->result_array();
    }


    //GET ALL DATA laporan per hari
    public function getAllPO()
    {
        return $this->db->get('tbl_kain')->result_array();
    }

    // penjualan arai

    public function tampilpenjualan()
    {
        return $this->db->get('tbl_penjualanarai')->result_array();
    }



    public function PenjualanId($id)
    {
        return $this->db->get_where('tbl_penjualanarai', ['id' => $id])->row_array();
    }

    public function tampilpenjualanC()
    {
        $query = "SELECT * FROM tbl_customer join
        tbl_penjualanarai on tbl_customer.id = tbl_penjualanarai.idCustomer ORDER BY tbl_penjualanarai.id DESC";

        return $this->db->query($query)->result_array();
    }

    public function tampilpenjualanId($id)
    {
        $query = "SELECT * FROM tbl_penjualanarai join
        tbl_customer on tbl_penjualanarai.idCustomer = tbl_customer.id ORDER BY tbl_customer.id DESC";

        return $this->db->get_where('tbl_penjualanarai', ['id' => $id])->row_array();
    }



    public function tambahPenjualan()
    {
        $data = [
            "idCustomer" => $this->input->post('idCustomer', true),
            "noPo" => $this->input->post('noPo', true),
            "date_created" => $this->input->post('date_created', true)

        ];

        $this->db->insert('tbl_penjualanarai', $data);
    }

    public function editPenjualanArai()
    {
        $data = [
            "idCustomer" => $this->input->post('idCustomer', true),
            "noPo" => $this->input->post('noPo', true),
            "date_created" => $this->input->post('date_created', true)

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_penjualanarai', $data);
    }

    public function hapusPenjualan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_penjualanarai');
    }

    public function hapusPenjualanDetail($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_penjualandetail');
    }

    public function detailPenjualan()
    {
        return $this->db->get('tbl_penjualandetail')->result_array();
    }

    public function tambahPenjualanDetail()
    {
        $data = [
            "idPenjualan" => $this->input->post('idPenjualan', true),
            "kdProduct" => $this->input->post('kdProduct', true),
            "namaProduct" => $this->input->post('namaProduct', true),
            "idKain" => $this->input->post('idKain', true),
            "warnaKain" => $this->input->post('warnaKain', true),
            "lebar" => $this->input->post('lebar', true),
            "tinggi" => $this->input->post('tinggi', true),
            "jumlahSet" => $this->input->post('jumlahSet', true),
            "date_created" => $this->input->post('date_created', true)

        ];

        $this->db->insert('tbl_penjualandetail', $data);
    }

    public function tampilpenjualandetail()
    {
        return $this->db->get('tbl_penjualandetail')->result_array();
    }

    public function ubahDetailPenjualan()
    {
        $data = [
            "idPenjualan" => $this->input->post('idPenjualan', true),
            "namaProduct" => $this->input->post('namaProduct', true),
            "idKain" => $this->input->post('idKain', true),
            "warnaKain" => $this->input->post('warnaKain', true),
            "lebar" => $this->input->post('lebar', true),
            "tinggi" => $this->input->post('tinggi', true),
            "jumlahSet" => $this->input->post('jumlahSet', true),
            "date_created" => $this->input->post('date_created', true)

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_penjualandetail', $data);
        return TRUE;
    }


    //=====================================STOK ARAI ==========================

    public function stok_arai()
    {
        $query = "SELECT * FROM tbl_stokarai join
        tbl_kain on tbl_stokarai.idKAin = tbl_kain.id join
        tbl_warnakain on tbl_stokarai.warnaKAin = tbl_warnakain.id  ORDER BY tbl_stokarai.stok DESC";

        return $this->db->query($query)->result_array();
    }
    public function stok_araiin()
    {
        $query = "SELECT * FROM tbl_instokarai join
        tbl_kain on tbl_instokarai.idKAin = tbl_kain.id join
        tbl_warnakain on tbl_instokarai.warnaKAin = tbl_warnakain.id  ORDER BY tbl_instokarai.id DESC";

        return $this->db->query($query)->result_array();
    }

    public function tambahstok()
    {
        $data = [

            "kdProduct" => $this->input->post('kdProduct', true),
            "namaProduct" => $this->input->post('namaProduct', true),
            "idKain" => $this->input->post('idKain', true),
            "warnaKain" => $this->input->post('warnaKain', true),
            "lebar" => $this->input->post('lebar', true),
            "tinggi" => $this->input->post('tinggi', true),
            "totalStok" => $this->input->post('totalStok', true),
            "date_created" => $this->input->post('date_created', true)

        ];

        $this->db->insert('tbl_instokarai', $data);
    }
}
