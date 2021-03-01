<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        $this->load->helper('url');
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('template/footer');
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Acces';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/role-Access', $data);
        $this->load->view('template/footer');
    }

    public function changeAccess()
    {

        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id

        ];

        $result = $this->db->get_where('user_acces_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_acces_menu', $data);
        } else {
            $this->db->delete('user_acces_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access Changed !!
       </div>');
    }

    public function addrole()
    {
        $data['title'] = 'Role Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['rolemanagement'] = $this->Admin_model->tampil_menu();


        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template/footer');
        } else {
            $this->Admin_model->tambahRole();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            added Management Role !!
           </div>');
            redirect('admin/role');
        }
    }

    public function editRole($id)
    {
        $data['title'] = 'Category Asset';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['Role'] = $this->Admin_model->getRoleId($id);

        $this->form_validation->set_rules('role', 'Role Name', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/editRole', $data);
            $this->load->view('template/footer');
        } else {
            $this->Admin_model->ubahRole($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Role succes changed !!
           </div>');
            redirect('admin/role');
        }
    }

    public function deleteRole($id)
    {
        $this->Admin_model->hapusRole($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Role deleted !!
           </div>');
        redirect('admin/role');
    }


    public function roleManagement()
    {
        $data['title'] = 'Role Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['rolemanagement'] = $this->Admin_model->tampil_menu();


        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/roleManagement', $data);
            $this->load->view('template/footer');
        } else {
            $this->Admin_model->tambahMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            added Management Menu !!
           </div>');
            redirect('admin/roleManagement');
        }
    }

    public function editRoleManagement($id)
    {
        $data['title'] = 'Category Asset';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menuManagement'] = $this->Admin_model->getMenuId($id);

        $this->form_validation->set_rules('menu', 'Menu Name', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/editRoleManagement', $data);
            $this->load->view('template/footer');
        } else {
            $this->Admin_model->ubahMenu($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Menu succes changed !!
           </div>');
            redirect('admin/roleManagement');
        }
    }

    public function deleteRoleManagement($id)
    {
        $this->Admin_model->hapusMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Menu Management Hasbeen deleted !!
           </div>');
        redirect('admin/roleManagement');
    }
}
