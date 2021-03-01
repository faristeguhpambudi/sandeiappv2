<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function tampil_menu()
    {
        return $this->db->get('user_menu', 'ASC')->result_array();
    }

    public function getMenuId($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function hapusMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function ubahMenu($id)
    {
        $data = [

            "menu" => $this->input->post('menu', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    public function tambahMenu()
    {
        $data = [

            "menu" => $this->input->post('menu', true)
        ];

        $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
    }

    public function tambahRole()
    {
        $data = [

            "role" => $this->input->post('role', true)
        ];

        $this->db->insert('user_role', ['role' => $this->input->post('role')]);
    }

    public function ubahRole($id)
    {
        $data = [

            "role" => $this->input->post('role', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_role', $data);
    }

    public function hapusRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }

    public function getRoleId($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }
}
