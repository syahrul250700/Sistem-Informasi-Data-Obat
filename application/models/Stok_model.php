<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Stok_model extends CI_Model
 {
 	public function getAllData(){
 			$queryStok = "SELECT * FROM tb_stok
              INNER JOIN tb_obat on tb_obat . id_obat = tb_stok . id_obat";

              return $this->db->query($queryStok)->row_array();
 		}
 	public function getStokById($id_stok){
 			return $this->db->get_where('tb_stok', ['id_stok' => $id_stok])->row_array();
 		}
 	public function editStokObat(){

 		$data = [
	 			"id_obat" => $this->input->post('id_obat', true),
	 			"sisa_stok" => $this->input->post('sisa_stok', true),
	 			"ket" => $this->input->post('ket', true),
	 		];
	 		$this->db->where('id_stok', $this->input->post('id_stok'));
	 		$this->db->update('tb_stok', $data);
 		}
 	public function hapus_stok_obat($id_stok){
 		$this->db->where('id_stok', $id_stok);
 		$this->db->delete('tb_stok');
 		}
 }