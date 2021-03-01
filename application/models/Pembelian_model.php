<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_model extends CI_Model
{

    public function tampil()
    {
        $query = "SELECT  
        *

    FROM `tbl_pembelian` order by id DESC";

        return $this->db->query($query)->result_array();
    }

    public function getbelitid($id)
    {
        return $this->db->get_where('tbl_pembelian', ['id' => $id])->row_array();
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_pembelian');
    }

    public function ubahPembelian()
    {
        $data = [

            "tgl_beli" => $this->input->post('tgl_beli', true),
            "nama_barang" => $this->input->post('nama_barang', true),
            "supplier" => $this->input->post('supplier', true),
            "qty" => $this->input->post('qty', true),
            "harga" => $this->input->post('harga', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_pembelian', $data);
    }

    public function tambah()
    {
        $data =  [

            "tgl_beli" => $this->input->post('tgl_beli'),
            "nama_barang" => $this->input->post('nama_barang', true),
            "supplier" => $this->input->post('supplier', true),
            "qty" => $this->input->post('qty', true),
            "harga" => $this->input->post('harga', true)
        ];

        $this->db->insert('tbl_pembelian', $data);
    }


    /////////////////////////////////// SN PEMBELIAN /////////////////////////

    public function tampilsn()
    {
        $query = "SELECT  
                            `tbl_snPembelian`.`id_pembeli`, 
                            `tbl_Pembelian`.`id` , 
                            `tbl_snPembelian`.`sn` , 
                            `tbl_snPembelian`.`qty` , 
                            `tbl_pembelian`.`nama_barang` 
        
                        FROM `tbl_pembelian` join `tbl_snPembelian`   on `tbl_pembelian`.`id` = `tbl_snPembelian`.`id_pembeli`
                      
                    
        ";

        return $this->db->query($query)->result_array();
    }

    public function getSnid($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_pembelian');
        $this->db->join('tbl_snpembelian', 'tbl_pembelian.id = tbl_snpembelian. id_pembeli');
        $this->db->where('tbl_pembelian.id', $id);
        return $query = $this->db->get()->result_array();
    }

    public function tambahsn()
    {
        $data =  [

            "id_pembeli" => $this->input->post('id_pembeli', true),
            "sn" => $this->input->post('sn', true),
            "qty" => $this->input->post('qty', true)

        ];

        $this->db->insert('tbl_snPembelian', $data);
    }

    public function hapussn($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_snpembelian');
    }


    public function getId($id)
    {
        return $this->db->get_where('tbl_snpembelian', ['id' => $id])->row_array();
    }


    public function ubahSnPembelian()
    {
        $data = [

            "id_pembeli" => $this->input->post('id_pembeli', true),
            "sn" => $this->input->post('sn', true),
            "qty" => $this->input->post('qty', true)

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_snpembelian', $data);
    }
}
