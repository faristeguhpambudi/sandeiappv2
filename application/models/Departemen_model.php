<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departemen_model extends CI_Model
{

    public function tampilDepartemen()
    {
        return $this->db->get('tbl_departemen')->result_array();
    }

    public function getDepartemenId($id)
    {
        return $this->db->get_where('tbl_departemen', ['departemen_id' => $id])->row_array();
    }

    public function hapus_departemen($id)
    {
        $this->db->where('departemen_id', $id);
        $this->db->delete('tbl_departemen');
    }

    public function ubah_departemen()
    {
        $data = [

            "nama_departemen" => $this->input->post('nama_departemen', true)
        ];

        $this->db->where('departemen_id', $this->input->post('departemen_id'));
        $this->db->update('tbl_departemen', $data);
    }

    public function tambah_departemen()
    {
        $data = [

            "nama_barang" => $this->input->post('nama_barang', true)
        ];

        $this->db->insert('tbl_departemen', ['nama_barang' => $this->input->post('nama_barang')]);
    }
}
