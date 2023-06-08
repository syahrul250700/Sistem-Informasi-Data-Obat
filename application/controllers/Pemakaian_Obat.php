<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemakaian_Obat extends CI_Controller 
{
    public function __construct()
  {
    parent::__construct();
    $this->load->model('Pemakaian_model');
    is_logged_in();
    
  }
  public function index()
  {
    $data['title'] = 'Pemakaian Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
   
    $data['Pemakaian_Obat'] = $this->db->get('tb_pemakaian')->result_array();
    $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/pemakaian_obat/index',$data);
    $this->load->view('templates/footer');

  }
  public function tambah_pemakaian(){
    
    $data['title'] = 'Pemakaian Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
   
    $data['Pemakaian_Obat'] = $this->db->get('tb_pemakaian')->result_array();
    $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();

    $this->form_validation->set_rules('tanggal_pemakaian', 'Tanggal', 'required');
    $this->form_validation->set_rules('id_obat', 'ID Obat', 'required|numeric');
    $this->form_validation->set_rules('jml_pemakaian', 'Jumlah pemakaian', 'required|numeric');

    if($this->form_validation->run() == false){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/pemakaian_obat/index',$data);
    $this->load->view('templates/footer');
    }else{
        $data = [
        'tanggal_pemakaian' => $this->input->post('tanggal_pemakaian'),
        'id_obat' =>$this->input->post('id_obat'),
        'jml_pemakaian' => $this->input->post('jml_pemakaian'),
      ];
      $this->db->insert('tb_pemakaian', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pemakaian berhasil ditambahkan</div>');
      redirect('pemakaian_obat');
      
    }
  }
  public function edit_pemakaian_obat($id_pemakaian){
    $data ['title'] = 'Edit Pemakaian Obat';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

    $data['Pemakaian_Obat'] = $this->Pemakaian_model->getPemakaianById($id_pemakaian);
    $data['Data_Obat'] = $this->db->get('tb_obat')->result_array();
   
    $this->form_validation->set_rules('tanggal_pemakaian', 'Tanggal', 'required');
    $this->form_validation->set_rules('id_obat', 'ID Obat', 'required|numeric');
    $this->form_validation->set_rules('jml_pemakaian', 'Jumlah Pemakaian', 'required|numeric');

  if($this->form_validation->run() == false){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/pemakaian_obat/edit',$data);
    $this->load->view('templates/footer');
  }else{
      $this->Pemakaian_model->editPemakaianObat();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pemakaian berhasil diubah </div>');
      redirect('pemakaian_obat');}
  }
  public function hapus_pemakaian_obat($id_pemakaian){
    $this->Pemakaian_model->hapus_pemakaian_obat($id_pemakaian);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Pemakaian berhasil dihapus</div>');
      redirect('pemakaian_obat');
  }
}



 // $stok_awal = $this->db->get_where("tb_obat", ["id_obat" => $this->input->post("id_obat")])->result_array();
   

    // $data = ["tanggal" => $this->input->post('tanggal', true),
    //          "nama_obat" => $this->input->post('nama_obat'),
    //          "jml_pemakaian" => $this->input->post('jml_pemakaian', true),
    //         ];
  

    //  var_dump($data);
    // die();