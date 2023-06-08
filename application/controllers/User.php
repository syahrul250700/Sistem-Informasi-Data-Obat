<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    
  }
  public function index()
  {
  	$data['title'] = 'My Profile';
  	$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();


  	$this->load->view('templates/header', $data);
  	$this->load->view('templates/sidebar', $data);
  	$this->load->view('templates/topbar', $data);
  	$this->load->view('user/index',$data);
  	$this->load->view('templates/footer');

  }
  public function edit_user()
  {
    $data['title'] = 'Edit Profile';
    $data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

   $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
   $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
   $this->form_validation->set_rules('profesi', 'Profesi', 'required|trim');

if ($this->form_validation->run() == false) {
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('user/edit',$data);
    $this->load->view('templates/footer');
}else{
  $name = $this->input->post('name');
  $email = $this->input->post('email');
  $tgl_lahir = $this->input->post('tgl_lahir');
  $profesi = $this->input->post('profesi');


  // cek jika ada gambar yang akan diupload
  $upload_image = $_FILES['image']['name'];

  
  if($upload_image){
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '6048';
        $config['upload_path'] = './assets/img/profile/';

        $this->load->library('upload', $config);

      // ketika sudah lolos pengecekan, upload
        if ($this->upload->do_upload('image')) {
          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
      // jika gagal, tampilkan error nya 
          }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect('user');
            
          }
        }
  

  $this->db->set('profesi', $profesi);
  $this->db->set('tgl_lahir', $tgl_lahir);
  $this->db->set('name', $name);
  $this->db->where('email', $email);
  $this->db->update('tb_user');

  $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Profil Berhasil Di Update</div>');
      redirect('user');
}

  }


}