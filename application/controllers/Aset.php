<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Aset_model');
        $this->load->helper('url');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Category Asset';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['nama_barang'] = $this->db->get('tbl_aset')->result_array();

        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('aset/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->Aset_model->tambahAset();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Asset Add !!
           </div>');
            redirect('aset');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Category Asset';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['aset'] = $this->Aset_model->getasetid($id);

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('aset/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Aset_model->ubahAset();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            your Profile has been updated !!
           </div>');
            redirect('aset/');
        }
    }

    public function hapus($id)
    {
        $this->Aset_model->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hasbeen deleted !!
           </div>');
        redirect('aset/');
    }

    /////////////////////////    TRACKING ASET  ////////////////////////////


    public function TrackingAset()
    {
        $data['title'] = 'Tracking Asset';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['aset'] = $this->db->get('tbl_aset')->result_array();
        $data['departemen'] = $this->db->get('tbl_departemen')->result_array();
        $data['tracking'] = $this->db->get('tbl_tracking')->result_array();
        $data['allTrack'] = $this->Aset_model->getTracking();


        $this->form_validation->set_rules('id_aset', 'Item Name', 'required');
        $this->form_validation->set_rules('departemen_id', 'Departemen Name', 'required');
        $this->form_validation->set_rules('nama_karyawan', 'Employe Name', 'required');
        $this->form_validation->set_rules('tgl_serah_terima', 'Handover Date', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('aset/tracking', $data);
            $this->load->view('template/footer');
        } else {
            $this->Aset_model->addTracking();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            added Tracking Assets !!
           </div>');
            redirect('aset/TrackingAset');
        }
    }



    public function UpdateTracking($id)
    {
        $data['title'] = 'Updated Tracking Asset';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['aset'] = $this->Aset_model->tampil_aset();
        $data['allTrack'] = $this->Aset_model->getTrackingId($id);

        $this->form_validation->set_rules('id_aset', 'Item Name', 'required');
        $this->form_validation->set_rules('departemen_id', 'Departemen Name', 'required');
        $this->form_validation->set_rules('nama_karyawan', 'Employe Name', 'required');
        $this->form_validation->set_rules('tgl_serah_terima', 'Handover Date', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('aset/editTracking', $data);
            $this->load->view('template/footer');
        } else {
            $this->Aset_model->editT($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Updated Tracking Assets !!
           </div>');
            redirect('aset/TrackingAset');
        }
    }


    public function hapusTracking($id)
    {
        $this->Aset_model->hapusTracking($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hasbeen deleted !!
           </div>');
        redirect('aset/TrackingAset');
    }
}
