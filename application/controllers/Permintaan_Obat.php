<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_Obat extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Permintaan_model');
    is_logged_in();
    
  }
  public function index()
  {
    $data['title'] = 'Permintaan Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
   
    $data['Permintaan_Obat'] = $this->db->get('tb_permintaan')->result_array();
    $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/permintaan_obat/index',$data);
    $this->load->view('templates/footer');

  }
  public function tambah_permintaan_obat(){
    $data['title'] = 'Permintaan Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
   
    $data['Permintaan_Obat'] = $this->db->get('tb_permintaan')->result_array();
    $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();

    $this->form_validation->set_rules('tanggal_permintaan', 'Tanggal', 'required');
    $this->form_validation->set_rules('id_obat', 'ID Obat', 'required|numeric');
    $this->form_validation->set_rules('jml_permintaan', 'Jumlah permintaan', 'required|numeric');


    if($this->form_validation->run() == false){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/permintaan_obat/index',$data);
    $this->load->view('templates/footer');
    }else{
       $data = [
        'tanggal_permintaan' => $this->input->post('tanggal_permintaan'),
        'id_obat' =>$this->input->post('id_obat'),
        'jml_permintaan' => $this->input->post('jml_permintaan'),
      ];
      $this->db->insert('tb_permintaan', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Permintaan berhasil ditambahkan</div>');
      redirect('permintaan_obat');
      
    }
  }
  public function edit_permintaan_obat($id_permintaan){
     $data['title'] = 'Edit Permintan Obat';
     $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
     
     $data['permintaan'] = $this->Permintaan_model->getAllData();
     $data['Permintaan_Obat'] = $this->Permintaan_model->getPermintaanById($id_permintaan);
     $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();
   
    $this->form_validation->set_rules('tanggal_permintaan', 'Tanggal', 'required');
    $this->form_validation->set_rules('id_obat', 'ID Obat', 'required|numeric');
    $this->form_validation->set_rules('jml_permintaan', 'Jumlah Permintaan', 'required|numeric');

  if($this->form_validation->run() == false){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/permintaan_obat/edit',$data);
    $this->load->view('templates/footer');
  }else{
      $this->Permintaan_model->editPermintaanObat();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Permintaan berhasil diubah </div>');
      redirect('permintaan_obat');}
  }
  public function hapus_permintaan_obat($id_permintaan){
    $this->Permintaan_model->hapus_permintaan_obat($id_permintaan);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Permintaan berhasil dihapus</div>');
      redirect('permintaan_obat');
  }
}