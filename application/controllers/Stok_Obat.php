<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_Obat extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Stok_model');
   is_logged_in();
    
  }
  public function index()
  {
    $data['title'] = 'Stok Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
   
   $data['Stok_Obat'] = $this->db->get('tb_stok')->result_array();
   $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();  

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/stok_obat/index',$data);
    $this->load->view('templates/footer');

  }
  public function tambah_stok_obat(){
    $data['title'] = 'Stok Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
   
    $data['Stok_Obat'] = $this->db->get('tb_stok')->result_array();
    $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();

    $this->form_validation->set_rules('id_obat', 'Nama Obat', 'required');
    $this->form_validation->set_rules('sisa_stok', 'Sisa Stok', 'required|numeric');
    $this->form_validation->set_rules('ket', 'Keterangan', 'required');

    if($this->form_validation->run() == false){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/stok_obat/index',$data);
    $this->load->view('templates/footer');
  }else{
     $data = [
        'id_obat' => $this->input->post('id_obat'),
        'sisa_stok' =>$this->input->post('sisa_stok'),
        'ket' => $this->input->post('ket'),
      ];
      $this->db->insert('tb_stok', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Stok  berhasil ditambahkan</div>');
      redirect('stok_obat');}
  }
  public function edit_stok_obat($id_stok){
    $data['title'] = 'Edit data Stok Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

    
    $data['Stok_Obat'] = $this->Stok_model->getStokById($id_stok);
    $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();
   
    $this->form_validation->set_rules('id_obat', 'Nama Obat', 'required|numeric');
    $this->form_validation->set_rules('sisa_stok', 'Sisa Stok', 'required|numeric');
    $this->form_validation->set_rules('ket', 'Keterangan', 'required');

    if($this->form_validation->run() == false){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/stok_obat/edit',$data);
    $this->load->view('templates/footer');
  }else{
     $this->Stok_model->editStokObat();
     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Stok berhasil diubah </div>');
      redirect('stok_obat');}
  
  }
  public function hapus_stok_obat($id_stok){
    $this->load->model('Stok_model');
    $this->Stok_model->hapus_stok_obat($id_stok);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Stok berhasil dihapus</div>');
      redirect('stok_obat');
  }

}