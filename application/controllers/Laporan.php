<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{

 public function __construct()
  {
    parent::__construct();
    $this->load->model('Laporan_model');
    $this->load->helper('indo_helper');
    is_logged_in();
    
  }
  public function index()
  {
    $data['title'] = 'Laporan Data Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
       
    $data['tahun'] = $this->Laporan_model->getTahun();
    

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/laporan/index',$data);
    $this->load->view('templates/footer');
  }

  public function filter(){
    $tanggalawal = $this->input->post('tanggalawal');
    $tanggalakhir = $this->input->post('tanggalakhir');
    $tahun1 = $this->input->post('tahun1');
    $bulanawal = $this->input->post('bulanawal');
    $bulanakhir = $this->input->post('bulanakhir');
    $tahun2 = $this->input->post('tahun2');
    $nilaifilter = $this->input->post('nilaifilter');

    if ($nilaifilter == 1) {
      
      $data['title'] = "Laporan Obat By Tanggal";
      $data['subtitle'] = "TANGGAL  : ".date_indo($tanggalawal) .' - '.date_indo($tanggalakhir);
      $data['datafilter'] = $this->Laporan_model->filterByTanggal($tanggalawal,$tanggalakhir);

    
      $this->load->view('admin/laporan/print', $data);


    }elseif ($nilaifilter == 2) {
      
      $data['title'] = "Laporan Obat By Bulan";
      $data['subtitle'] = "BULAN   :  ".bulan($bulanawal);
      $data['datafilter'] = $this->Laporan_model->filterByBulan($tahun1,$bulanawal,$bulanakhir);

      $this->load->view('admin/laporan/print', $data);

    }elseif ($nilaifilter == 3) {
      
      $data['title'] = "Laporan Obat By Tahun";
      $data['subtitle'] = ' DATA TAHUN :  '.$tahun2;
      $data['datafilter'] = $this->Laporan_model->filterByTahun($tahun2);

     
      $this->load->view('admin/laporan/print', $data);
    }

  }
  
}