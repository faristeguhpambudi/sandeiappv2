<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Menu_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           New Menu Added !!
           </div>');
            redirect('menu');
        }
    }

    public function editMenu($id)
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_sub_menu')->result_array();
        $data['menu'] = $this->Menu_model->getMenu($id);

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/edit_menu', $data);
            $this->load->view('template/footer');
        } else {

            $this->Menu_model->updateMenu($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Menu Hasbeed Updated !!
           </div>');
            redirect('menu/');
        }
    }

    public function hapusMenu($id)
    {
        $this->Menu_model->hapusMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hasbeen deleted !!
           </div>');
        redirect('menu/');
    }

    ////////////////////////////////////////////////////    S U B M E N U   ////////////////////////////////////////////


    public function subMenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'menu_id' => $this->input->post('menu_id', 'true'),
                'title' => $this->input->post('title', 'true'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           New Menu Added !!
           </div>');
            redirect('menu/submenu');
        }
    }

    public function editSubMenu($id)
    {
        $data['title'] = 'Edit Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['submenuId'] = $this->Menu_model->getSubMenuId($id);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/editsubmenu', $data);
            $this->load->view('template/footer');
        } else {

            $this->Menu_model->updateSubMenu($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Update Sub Menu Succes !!
           </div>');
            redirect('menu/submenu');
        }
    }

    public function hapusSubMenu($id)
    {
        $this->Menu_model->hapusSubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Sub Menu  Hasbeen deleted !!
           </div>');
        redirect('menu/submenu');
    }


    ////////////////////////////////////////////////////    D E P A R T E M E N T   ////////////////////////////////////////////


    public function departemen()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/departemen', $data);
            $this->load->view('template/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           New Menu Added !!
           </div>');
            redirect('menu');
        }
    }
}
