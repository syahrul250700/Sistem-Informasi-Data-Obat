<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Obat extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Obat_model');
    is_logged_in();
    
  }
  public function index()
  {
    $data['title'] = 'Data Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
   
   $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();

   
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data_obat/index',$data);
    $this->load->view('templates/footer');

  }
  public function tambah_data_obat(){
    $data['title'] = 'Data Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

    $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();

    $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
    $this->form_validation->set_rules('satuan', 'Satuan', 'required');
    $this->form_validation->set_rules('stok_awal', 'Stok Awal', 'required|numeric');


    if($this->form_validation->run() == false){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data_obat/index',$data);
    $this->load->view('templates/footer');
    }else{
      $data = [
        'nama_obat' => $this->input->post('nama_obat'),
        'satuan' => $this->input->post('satuan'),
        'stok_awal' => $this->input->post('stok_awal'),
      ];
      $this->db->insert('tb_obat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Obat berhasil ditambahkan</div>');
      redirect('data_obat');
    }

  }
  public function hapus_data_obat($id_obat){
    $this->load->model('Obat_model');
    $this->Obat_model->hapus_data_obat($id_obat);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Obat dihapus</div>');
      redirect('penerimaan_obat');
  }
  public function edit_data_obat($id_obat){
    $data['title'] = 'Edit Data Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['Data_Obat'] = $this->Obat_model->getObatById($id_obat);

    $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
    $this->form_validation->set_rules('satuan', 'Satuan', 'required');
    $this->form_validation->set_rules('stok_awal', 'Stok Awal', 'required|numeric');

    if($this->form_validation->run() == false){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data_obat/edit',$data);
    $this->load->view('templates/footer');
  }else{
      $this->Obat_model->edit_data_obat();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Obat berhasil diubah </div>');
      redirect('data_obat');}
  }
}