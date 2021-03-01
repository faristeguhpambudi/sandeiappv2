<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departemen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Departemen_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Departement Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['departemen'] = $this->db->get('tbl_departemen')->result_array();

        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/departemen', $data);
            $this->load->view('template/footer');
        } else {
            $this->Aset_model->tambahAset();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Asset Add !!
           </div>');
            redirect('aset');
        }
    }

    public function edit_departemen($id)
    {
        $data['title'] = 'Category Asset';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['departemen'] = $this->Departemen_model->getDepartemenId($id);

        $this->form_validation->set_rules('nama_departemen', 'Nama Departemen', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('Menu/edit_departemen', $data);
            $this->load->view('template/footer');
        } else {
            $this->Departemen_model->ubah_departemen($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            your Profile has been updated !!
           </div>');
            redirect('departemen');
        }
    }

    public function hapus_departemen($id)
    {
        $this->Departemen_model->hapus_departemen($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hasbeen deleted !!
           </div>');
        redirect('departemen');
    }
}
