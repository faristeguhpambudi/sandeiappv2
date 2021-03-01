<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function getMenu($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function hapusMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function updateMenu()
    {
        $data = [

            "menu" => $this->input->post('menu', true)

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    //////////////////////////// S U B M E N U /////////////////////////////
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` 
        FROM `user_sub_menu` join `user_menu` 
        on `user_sub_menu`.`menu_id` = `user_menu`.`id`
       
        ";

        return $this->db->query($query)->result_array();
    }



    public function getallsubmenu()
    {
        return $this->db->get('user_sub_menu')->result_array();
    }

    public function getSubMenuId($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function updateSubMenu()
    {
        $data = [

            "menu_id" => $this->input->post('menu_id', true),
            "title" => $this->input->post('title', true),
            "url" => $this->input->post('url', true),
            "icon" => $this->input->post('icon', true),
            "is_active" => $this->input->post('is_active', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }


    public function hapusSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }
}
