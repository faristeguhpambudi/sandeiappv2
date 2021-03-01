<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('pembelian_model');
        $this->load->helper('url');
    }


    public function index()
    {
        $data['title'] = 'Form Pembelian';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['aset'] = $this->db->get('tbl_aset')->result_array();
        $data['pembelian'] = $this->pembelian_model->tampil();


        $this->form_validation->set_rules('tgl_beli', 'Tanggal Beli', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('supplier', 'supplier', 'required');
        $this->form_validation->set_rules('qty', 'Quantity', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('pembelian/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->pembelian_model->tambah();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Shopping Added!!
            </div>');
            redirect('pembelian/');
        }
    }

    public function ubahPembelian($id)
    {
        $data['title'] = 'Form Change Asset';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pembelian'] = $this->pembelian_model->getbelitid($id);


        $this->form_validation->set_rules('tgl_beli', 'Purchase Date', 'required|trim');
        $this->form_validation->set_rules('nama_barang', 'Item Name', 'required|trim');
        $this->form_validation->set_rules('supplier', 'Supplier', 'required|trim');
        $this->form_validation->set_rules('qty', 'Quantity', 'required|trim');
        $this->form_validation->set_rules('harga', 'Price', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('pembelian/ubah', $data);
            $this->load->view('template/footer');
        } else {
            $this->pembelian_model->ubahPembelian();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            your Profile has been updated !!
           </div>');
            redirect('pembelian/');
        }
    }

    public function hapus($id)
    {
        $this->pembelian_model->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hasbeen deleted !!
           </div>');
        redirect('pembelian/');
    }

    /////////////////////////// SN pembelian //////////////////////////////////////////////
    public function snPembelian($id)
    {
        $data['title'] = 'Form Serial Number Pembelian';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['aset'] = $this->db->get('tbl_aset')->result_array();
        $data['pembelianAll'] = $this->pembelian_model->getbelitid($id);
        $data['pembelian'] = $this->pembelian_model->getSnid($id);

        $this->form_validation->set_rules('id_pembeli', 'id Pembeli', 'required');
        $this->form_validation->set_rules('sn', 'Serial Number', 'required');
        $this->form_validation->set_rules('qty', 'Quantity', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('pembelian/snPembelian', $data);
            $this->load->view('template/footer');
        } else {
            $this->pembelian_model->tambahSn();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Serial Number Added!!
            </div>');
            redirect('pembelian/snPembelian/' . $id);
        }
    }

    public function ubahPembeliansn($id)
    {
        $data['title'] = 'Form Change Serial Number';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pembelian'] = $this->pembelian_model->getId($id);



        $this->form_validation->set_rules('qty', 'Quantity', 'required|trim');
        $this->form_validation->set_rules('sn', 'Serial Number', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('pembelian/ubahPembeliansn', $data);
            $this->load->view('template/footer');
        } else {
            $this->pembelian_model->ubahSnPembelian();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Serial Number or Quantity has been updated !!
           </div>');
            redirect('pembelian/');
        }
    }


    public function hapussn($id)
    {

        $this->pembelian_model->hapussn($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hasbeen deleted !!
           </div>');
        redirect('pembelian/snPembelian/' . $id);
    }
}
