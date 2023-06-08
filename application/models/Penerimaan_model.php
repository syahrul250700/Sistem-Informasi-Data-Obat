<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Penerimaan_model extends CI_Model
 {
 		public function getAllData(){
 			$queryPenerimaan = "SELECT * FROM tb_penerimaan
              INNER JOIN tb_obat on tb_obat . id_obat = tb_penerimaan . id_obat";

              return $this->db->query($queryPenerimaan)->row_array();
 		}

 		public function getPenerimaanById($id_penerimaan){
 			return $this->db->get_where('tb_penerimaan', ['id_penerimaan' => $id_penerimaan])->row_array();
 		}
 		public function editPenerimaanObat(){

 		$data = [
	 			"tanggal_penerimaan" => $this->input->post('tanggal_penerimaan', true),
	 			"id_obat" => $this->input->post('id_obat', true),
	 			"jml_penerimaan" => $this->input->post('jml_penerimaan', true),
	 		];
	 		$this->db->where('id_penerimaan', $this->input->post('id_penerimaan'));
	 		$this->db->update('tb_penerimaan', $data);
 		}
 		public function hapus_penerimaan_obat($id_penerimaan){
 		$this->db->where('id_penerimaan', $id_penerimaan);
 		$this->db->delete('tb_penerimaan');
 		}
 }

 ?>

 