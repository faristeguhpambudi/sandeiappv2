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

    public function getAllRole()
    {
        //buat query
        $query = "SELECT *
                     FROM `user_role` 
                     ORDER BY `user_role`.`role` ASC
         ";

        //jalanin query
        return $this->db->query($query)->result_array();
    }

    public function getUserRole()
    {
        //buat query
        $query = "SELECT `user`.*, `user_role`.`role`
                     FROM `user` 
                     JOIN `user_role` ON `user`.`role_id` = `user_role`.`id`
                     ORDER BY `user`.`name` ASC
         ";

        //jalanin query
        return $this->db->query($query)->result_array();
    }

    public function getUserRoleById($id)
    {
        //buat query
        $query = "SELECT `user`.*, `user_role`.`role`
                     FROM `user` 
                     JOIN `user_role` ON `user`.`role_id` = `user_role`.`id`
                     WHERE `user`.`id` = $id
                     ORDER BY `user`.`name` ASC
         ";

        //jalanin query
        return $this->db->query($query)->row_array();
    }

    public function tambahUserRole()
    {
        $data = [
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "image" => "",
            "password" => "12345678",
            "role_id" => 2,
            "is_active" => 1,
            "date_created" => time()
        ];
        $this->db->insert('user', $data);
    }

    public function ubahUserRoleManagement($id)
    {
        $data = [
            "id" => $this->input->post('id', true),
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "role_id" => $this->input->post('role_id', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function hapusUserRoleManagement($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
