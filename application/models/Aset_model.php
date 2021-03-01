<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset_model extends CI_Model
{

    public function tampil_aset()
    {
        return $this->db->get('tbl_aset')->result_array();
    }

    public function getasetid($id)
    {
        return $this->db->get_where('tbl_aset', ['id' => $id])->row_array();
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_aset');
    }

    public function ubahAset()
    {
        $data = [

            "nama_barang" => $this->input->post('nama_barang', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_aset', $data);
    }

    public function tambahAset()
    {
        $data = [

            "nama_barang" => $this->input->post('nama_barang', true)
        ];

        $this->db->insert('tbl_aset', ['nama_barang' => $this->input->post('nama_barang')]);
    }


    /////////////////   tracking aset ////////////////////


    public function getTracking()
    {
        $query = "SELECT  `tbl_tracking`.`id_tracking` , 
                        `tbl_tracking`.`nama_karyawan` , 
                        `tbl_tracking`.`tgl_serah_terima` , 
                        `tbl_tracking`.`tgl_buat` , 
                        `tbl_departemen`.`nama_departemen`,
                        `tbl_aset`.`nama_barang`
                FROM `tbl_tracking` join `tbl_aset`   on `tbl_tracking`.`id_aset` = `tbl_aset`.`id`
               join `tbl_departemen` on `tbl_tracking`.`departemen_id` = `tbl_departemen`.`departemen_id`
                    
        ";

        return $this->db->query($query)->result_array();
    }

    public function getTrackingId($id)
    {
        $query = "SELECT  `tbl_tracking`.`id_tracking` , 
                        `tbl_tracking`.`nama_karyawan` , 
                        `tbl_tracking`.`tgl_serah_terima` , 
                        `tbl_tracking`.`tgl_buat` , 
                       `tbl_departemen`.`nama_departemen`,
                       `tbl_aset`.`id`,
                        `tbl_aset`.`nama_barang`
                FROM `tbl_tracking` join `tbl_aset`   on `tbl_tracking`.`id_aset` = `tbl_aset`.`id`
               join `tbl_departemen` on `tbl_tracking`.`departemen_id` = `tbl_departemen`.`departemen_id`
               
                    
        ";

        return $this->db->get_where('tbl_tracking', ['id_tracking' => $id])->row_array();
    }


    public function AsetAll()
    {
        $this->db->get('tbl_tracking');
    }

    public function TrackingId($id)
    {
        return $this->db->get_where('tbl_tracking', ['id_tracking' => $id])->row_array();
    }


    public function addTracking()
    {
        $data = [

            "id_aset" => $this->input->post('id_aset', true),
            "departemen_id" => $this->input->post('departemen_id', true),
            "nama_karyawan" => $this->input->post('nama_karyawan', true),
            "tgl_serah_terima" => $this->input->post('tgl_serah_terima', true),
            "tgl_buat" => $this->input->post('tgl_buat', true)
        ];

        $this->db->insert('tbl_tracking', $data);
    }

    public function editT($id)
    {
        $data = [

            "id_aset" => $this->input->post('id_aset', true),
            "departemen_id" => $this->input->post('departemen_id', true),
            "nama_karyawan" => $this->input->post('nama_karyawan', true),
            "tgl_serah_terima" => $this->input->post('tgl_serah_terima', true),
            "tgl_buat" => $this->input->post('tgl_buat', true)
        ];
        $this->db->where('id_tracking', $this->input->post('id_tracking'));
        $this->db->update('tbl_tracking', $data);
    }

    public function hapusTracking($id)
    {
        $this->db->where('id_tracking', $id);
        $this->db->delete('tbl_tracking');
    }
}
