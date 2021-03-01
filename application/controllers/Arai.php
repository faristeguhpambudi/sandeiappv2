<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Arai_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Customer Arai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['customer'] = $this->Arai_model->tampil_customer();

        $this->form_validation->set_rules('nama_customer', 'Customer Name', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->tambahCustomer();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Customer Succes Add
           </div>');
            redirect('arai');
        }
    }

    public function editCustomer($id)
    {
        $data['title'] = 'Updated Customer Arai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['customer'] = $this->Arai_model->tampil_customer();
        $data['editC'] = $this->Arai_model->customerId($id);

        $this->form_validation->set_rules('nama_customer', 'Customer Name', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/editCustomer', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->editCustomer();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Customer Succes Updated !!
           </div>');
            redirect('arai');
        }
    }

    public function hapusCustomer($id)
    {
        $this->Arai_model->hapusCustomer($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Customer Hasbeen deleted !!!
           </div>');
        redirect('arai');
    }


    // SYSTEM ARAI

    public function product()
    {
        $data['title'] = 'Product / system Arai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kain'] = $this->Arai_model->tampilKain();
        $data['warna'] = $this->Arai_model->tampilWarnaKain();
        $data['product'] = $this->Arai_model->tampilALL();
        $data['category'] = $this->Arai_model->get_Product()->result();

        $this->form_validation->set_rules('namaProduct', 'Product Name', 'required');
        $this->form_validation->set_rules('idKain', 'Type Fabric', 'required');
        $this->form_validation->set_rules('warnaKain', 'Color Fabric', 'required');
        $this->form_validation->set_rules('lebar', 'width System', 'required');
        $this->form_validation->set_rules('tinggi', 'High System', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/product', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->tambahProduct();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Product Succes Added !!
           </div>');
            redirect('arai/product');
        }
    }

    function get_sub_Product()
    {
        $idKain = $this->input->post('id', TRUE);
        $data = $this->Arai_model->get_sub_Product($idKain)->result();
        echo json_encode($data);
    }

    public function editProduct($id)
    {
        $data['title'] = 'Updated Product';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kain'] = $this->Arai_model->tampilKain();
        $data['warna'] = $this->Arai_model->tampilWarnaKain();
        $data['product'] = $this->Arai_model->Product($id);


        $this->form_validation->set_rules('namaProduct', 'Product Name', 'required');
        $this->form_validation->set_rules('idKain', 'Type Fabric', 'required');
        $this->form_validation->set_rules('warnaKain', 'Color Fabric', 'required');
        $this->form_validation->set_rules('lebar', 'width System', 'required');
        $this->form_validation->set_rules('tinggi', 'High System', 'required');


        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/editProduct', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->editProduct();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Product Succes Updated !!
           </div>');
            redirect('arai/product');
        }
    }

    public function hapusProduct($id)
    {
        $this->Arai_model->hapusProduct($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Product Hasbeen deleted !!!
           </div>');
        redirect('arai/product');
    }



    //REPORT ARAI

    public function reportArai()
    {
        $data['title'] = 'Report Product Arai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['penjualan'] = $this->Arai_model->reportArai();

        $this->form_validation->set_rules('nama_customer', 'Customer Name', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/reportArai', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->tambahCustomer();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Customer Succes Add
           </div>');
            redirect('arai');
        }
    }

    public function reportFabric()
    {
        $data['title'] = 'Report Fabric Arai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['penjualan'] = $this->Arai_model->reportArai();

        $this->form_validation->set_rules('nama_customer', 'Customer Name', 'required');
        $this->form_validation->set_rules('alamat', 'Address', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/reportFabric', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->tambahCustomer();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Customer Succes Add
           </div>');
            redirect('arai');
        }
    }

    //PURCHASE REPORT //REPORT BY TOKO
    public function purchaseReport()
    {
        $data['title'] = 'Report By Toko';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data["toko"] = $this->Arai_model->getAllToko();

        $this->form_validation->set_rules('id', 'Toko', 'required');
        $data["idCustomer"] = $this->input->post("id");
        $this->session->set_userdata('customer', $data["idCustomer"]);

        if ($this->form_validation->run() == false) {
            $data['penjualan'] = $this->Arai_model->reportBerdasarkanToko();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar_report', $data);
            $this->load->view('arai/reportPerToko', $data);
            $this->load->view('template/footer');
        } else {
            //MENGIRIM DATA HISTORI DENGAN CARI
            $idToko = $this->input->post('id');
            $data['penjualan'] = $this->Arai_model->reportBerdasarkanToko2($idToko);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar_report', $data);
            $this->load->view('arai/reportPerToko', $data);
            $this->load->view('template/footer');
        }
    }

    //REPORT BERDASARKAN NO. PO
    public function reportByPo()
    {
        $data['title'] = "Report By PO";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('noPo', 'No. PO', 'required');
        $data["po"] = $this->input->post("noPo");
        $this->session->set_userdata('po', $data["po"]);

        if ($this->form_validation->run() == false) {
            $data['penjualan'] = $this->Arai_model->reportBerdasarkanPO();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar_report', $data);
            $this->load->view('arai/reportPerPO', $data);
            $this->load->view('template/footer');
        } else {
            //MENGIRIM DATA HISTORI DENGAN CARI
            $po = $this->input->post('noPo');
            $data['penjualan'] = $this->Arai_model->reportBerdasarkanPO2($po);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar_report', $data);
            $this->load->view('arai/reportPerPO', $data);
            $this->load->view('template/footer');
        }
    }

    //REPORT BERDASARKAN TYPE
    public function reportByType()
    {
        $data['title'] = "Report By Type";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data["type"] = $this->Arai_model->getAllType();
        $this->form_validation->set_rules('tipeKain', 'Type', 'required');
        $data["tipeKain"] = $this->input->post("tipeKain");
        $this->session->set_userdata('tipeKain', $data["tipeKain"]);

        if ($this->form_validation->run() == false) {
            $data['penjualan'] = $this->Arai_model->reportBerdasarkanType();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar_report', $data);
            $this->load->view('arai/reportPerType', $data);
            $this->load->view('template/footer');
        } else {
            //MENGIRIM DATA HISTORI DENGAN CARI
            $type = $this->input->post('tipeKain');
            $data['penjualan'] = $this->Arai_model->reportBerdasarkanType2($type);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar_report', $data);
            $this->load->view('arai/reportPerType', $data);
            $this->load->view('template/footer');
        }
    }

    //CETAK REPORT BY TOKO
    public function cetakReportByToko()
    {
        //MENYIAPKAN DATA UNTUK DIKIRIM
        $data["judulHalaman"] = "Report By Toko";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data["penjualan"]  = $this->Arai_model->reportBerdasarkanToko();

        $customer = $this->session->userdata('customer');
        //JIKA
        if ($customer == null) {
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "report-alltoko.pdf";
            $this->pdf->load_view('arai/report-alltokopdf', $data);
        } else {
            //MENGIRIM DATA HISTORI DENGAN CARI
            $data['penjualan'] = $this->Arai_model->reportBerdasarkanToko2($customer);
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "report-bytoko.pdf";
            $this->pdf->load_view('arai/report-bytokopdf', $data);
        }
    }

    //CETAK REPORT BY PO
    public function cetakReportByPo()
    {
        //MENYIAPKAN DATA UNTUK DIKIRIM
        $data["judulHalaman"] = "Report By PO";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data["penjualan"]  = $this->Arai_model->reportBerdasarkanPO();

        $po = $this->session->userdata('po');
        //JIKA
        if ($po == null) {
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "report-allPo.pdf";
            $this->pdf->load_view('arai/report-allPopdf', $data);
        } else {
            //MENGIRIM DATA HISTORI DENGAN CARI
            $data['penjualan'] = $this->Arai_model->reportBerdasarkanPO2($po);
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "report-byPo.pdf";
            $this->pdf->load_view('arai/report-byPopdf', $data);
        }
    }

    //CETAK REPORT BY TYPE
    public function cetakReportByType()
    {
        //MENYIAPKAN DATA UNTUK DIKIRIM
        $data["judulHalaman"] = "Report By Type";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data["penjualan"]  = $this->Arai_model->reportBerdasarkanType();

        $type = $this->session->userdata('tipeKain');
        //JIKA
        if ($type == null) {
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "report-alltype.pdf";
            $this->pdf->load_view('arai/report-alltypepdf', $data);
        } else {
            //MENGIRIM DATA HISTORI DENGAN CARI
            $data['penjualan'] = $this->Arai_model->reportBerdasarkanType2($type);
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "report-bytype.pdf";
            $this->pdf->load_view('arai/report-bytypepdf', $data);
        }
    }

    //CETAK REPORT BY TOKO
    public function cetakReportDay()
    {
        //MENYIAPKAN DATA UNTUK DIKIRIM
        $data["judulHalaman"] = "Daily Report";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data["penjualan"]  = $this->Arai_model->reportBerdasarkanToko();

        $customer = $this->session->userdata('customer');
        //JIKA
        if ($customer == null) {
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "report-alltoko.pdf";
            $this->pdf->load_view('arai/report-alltokopdf', $data);
        } else {
            //MENGIRIM DATA HISTORI DENGAN CARI
            $data['penjualan'] = $this->Arai_model->reportBerdasarkanToko2($customer);
            $this->load->library('pdf');

            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "report-bytoko.pdf";
            $this->pdf->load_view('arai/report-bytokopdf', $data);
        }
    }


    // ORDER ARAI
    public function order()
    {
        $data['title'] = 'Incoming Order';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tampilPenjualan'] = $this->Arai_model->tampilpenjualanC();
        $data['customer'] = $this->Arai_model->tampil_customer();


        $this->form_validation->set_rules('idCustomer', 'Customer Name', 'required');
        $this->form_validation->set_rules('noPo', 'PO Number', 'required|trim|is_unique[tbl_penjualanarai.noPo]');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/order', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->tambahPenjualan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Order Succes Added !!
           </div>');
            redirect('arai/order');
        }
    }


    public function editPenjualanArai($id)
    {
        $data['title'] = 'Updated Order Customer';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['kain'] = $this->Arai_model->tampilKain();
        $data['customer'] = $this->Arai_model->tampil_customer();
        $data['PenjualanId'] = $this->Arai_model->tampilpenjualanId($id);



        $this->form_validation->set_rules('noPo', 'Po Number', 'required');
        $this->form_validation->set_rules('idCustomer', 'Customer Name', 'required');



        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/editPenjualanArai', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->editPenjualanArai();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Order Customer Succes Updated !!
           </div>');
            redirect('arai/order');
        }
    }

    public function hapusPenjualan($id)
    {
        $this->Arai_model->hapusPenjualan($id);
        //   $this->Arai_model->hapusPenjualanDetail($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Order Hasbeen deleted !!!
           </div>');
        redirect('arai/order');
    }


    public function penjualanDetail($id)
    {
        $data['title'] = 'Form Detail Order';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['detailPenjualan'] = $this->Arai_model->detailPenjualan();
        $data['product'] = $this->Arai_model->tampilALL();
        $data['customer'] = $this->Arai_model->tampil_customer();
        $data['PenjualanId'] = $this->Arai_model->tampilpenjualanId($id);

        $this->form_validation->set_rules('jumlahSet', 'Quantiry', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/penjualanDetail', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->tambahPenjualanDetail();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Order Detail Succes Added !!
           </div>');
            redirect('arai/penjualanDetail/' . $id);
        }
    }


    public function get_product()
    {
        $kode = $this->input->post('kdProduct');
        $data = $this->Arai_model->get_product_bykode($kode);
        echo json_encode($data);
    }


    public function hapusPenjualanDetail($id)
    {
        $this->Arai_model->hapusPenjualanDetail($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
         Detail Product hasbeen deleted !!!
           </div>');
        redirect('arai/penjualanDetail/' . $id);
    }

    public function editPenjualanDetail($id)
    {
        $data['title'] = 'Form Detail Order';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['detailPenjualan'] = $this->Arai_model->detailPenjualan();
        $data['product'] = $this->Arai_model->tampilALL();
        $data['customer'] = $this->Arai_model->tampil_customer();
        $data['PenjualanId'] = $this->Arai_model->tampilpenjualanId($id);

        $this->form_validation->set_rules('jumlahSet', 'Quantiry', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/editpenjualanDetail', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->tambahPenjualanDetail();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Order Detail Succes Added !!
           </div>');
            redirect('arai/penjualanDetail/' . $id);
        }
    }

    function ubahDetailPenjualan()
    {
        $id = $this->input->post('id');
        $this->model_admin->ubah($id);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('arai/penjualanDetail/' . $id);
    }

    //---------------------------- stock   araii   ---------------------------


    public function stockArai()
    {
        $data['title'] = 'Customer Arai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['stokArai'] = $this->Arai_model->stok_arai();

        // $this->form_validation->set_rules('nama_customer', 'Customer Name', 'required');
        //  $this->form_validation->set_rules('alamat', 'Address', 'required');

        //   if ($this->form_validation->run() == false) {

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('arai/stok', $data);
        $this->load->view('template/footer');
    }



    //---------------------------- Incom Stok   arai   ---------------------------

    public function incom()
    {
        $data['title'] = 'Incoming Stok Arai';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Arai_model->tampilALL();
        $data['stokArai'] = $this->Arai_model->stok_araiin();

        $this->form_validation->set_rules('totalStok', 'Quantity', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/incom', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->tambahstok();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Stok Succes Added !!
           </div>');
            redirect('arai/incom');
        }
    }

    public function barangKeluar()
    {
        $data['title'] = 'Report PO';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kain'] = $this->Arai_model->tampilKain();
        // $data['ukuran'] = $this->Arai_model->tampilProduct();
        $data['warna'] = $this->Arai_model->tampilWarnaKain();


        $this->form_validation->set_rules('totalStok', 'Quantity', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('arai/barangkeluar', $data);
            $this->load->view('template/footer');
        } else {
            $this->Arai_model->tambahstok();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Stok Succes Added !!
           </div>');
            redirect('arai/incom');
        }
    }
}
