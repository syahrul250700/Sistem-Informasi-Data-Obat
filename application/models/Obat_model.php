<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Obat_model extends CI_Model
 {

 		public function getAllObat(){
 			return $this->db->get('tb_obat')->result_array();
 		}

 		
 		public function getObatById($id_obat){
 			return $this->db->get_where('tb_obat', ['id_obat' => $id_obat])->row_array();
 		}
 		public function edit_data_obat(){

 			$data = [
	 			"nama_obat" => $this->input->post('nama_obat', true),
	 			"satuan" => $this->input->post('satuan', true),
	 			"stok_awal" => $this->input->post('stok_awal', true),
	 		];
	 		$this->db->where('id_obat', $this->input->post('id_obat'));
	 		$this->db->update('tb_obat', $data);

 		}
 		public function hapus_data_obat($id_obat){
 		$this->db->where('id_obat', $id_obat);
 		$this->db->delete('tb_obat');
 		}
 }