<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_Obat extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Penerimaan_model');
    is_logged_in();
    
  }
  public function index()
  {
    $data['title'] = 'Penerimaan Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
   
   $data['Penerimaan_Obat'] = $this->db->get('tb_penerimaan')->result_array();
   $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/penerimaan_obat/index',$data);
    $this->load->view('templates/footer');

  }
  public function tambah_penerimaan_obat(){
    $data['title'] = 'Penerimaan Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
   
    $data['Penerimaan_Obat'] = $this->db->get('tb_penerimaan')->result_array();
    $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();

    $this->form_validation->set_rules('tanggal_penerimaan', 'Tanggal', 'required');
    $this->form_validation->set_rules('id_obat', 'ID Obat', 'required|numeric');
    $this->form_validation->set_rules('jml_penerimaan', 'Jumlah Penerimaan', 'required|numeric');

  if($this->form_validation->run() == false){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/penerimaan_obat/index',$data);
    $this->load->view('templates/footer');
  }else{
     $data = [
        'tanggal_penerimaan' => $this->input->post('tanggal_penerimaan'),
        'id_obat' =>$this->input->post('id_obat'),
        'jml_penerimaan' => $this->input->post('jml_penerimaan'),
      ];
      $this->db->insert('tb_penerimaan', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penerimaan berhasil ditambahkan</div>');
      redirect('penerimaan_obat');}
  }
  public function edit_penerimaan_obat($id_penerimaan){
     $data['title'] = 'Edit Penerimaan Obat';
     $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
     
     $data['penerimaan'] = $this->Penerimaan_model->getAllData();
     $data['Penerimaan_Obat'] = $this->Penerimaan_model->getPenerimaanById($id_penerimaan);
     $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();
   
    $this->form_validation->set_rules('tanggal_penerimaan', 'Tanggal', 'required');
    $this->form_validation->set_rules('id_obat', 'ID Obat', 'required|numeric');
    $this->form_validation->set_rules('jml_penerimaan', 'Jumlah Penerimaan', 'required|numeric');

  if($this->form_validation->run() == false){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/penerimaan_obat/edit',$data);
    $this->load->view('templates/footer');
  }else{
      $this->Penerimaan_model->editPenerimaanObat();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Penerimaan berhasil diubah </div>');
      redirect('penerimaan_obat');}
  }
  public function hapus_penerimaan_obat($id_penerimaan){
    $this->load->model('Penerimaan_model');
    $this->Penerimaan_model->hapus_penerimaan_obat($id_penerimaan);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Penerimaan berhasil dihapus</div>');
      redirect('penerimaan_obat');
  }
}