<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{ 
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model');
    is_logged_in();
    
  }
  public function index()
  {
  	$data['title'] = 'Dashboard';
  	$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['sum_penerimaan'] = $this->Admin_model->get_sum_penerimaan();
    $data['sum_pemakaian'] = $this->Admin_model->get_sum_pemakaian();
    $data['sum_permintaan'] = $this->Admin_model->get_sum_permintaan();
    $data['sum_obat'] = $this->Admin_model->get_sum_obat();
    $data['sum_stok'] = $this->Admin_model->get_sum_stok();



  	$this->load->view('templates/header', $data);
  	$this->load->view('templates/sidebar', $data);
  	$this->load->view('templates/topbar', $data);
  	$this->load->view('admin/index',$data);
  	$this->load->view('templates/footer');

  }
}