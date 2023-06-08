<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Permintaan_model extends CI_Model
 {
 	public function getAllData(){
 			$queryPermintaan = "SELECT * FROM tb_permintaan
              INNER JOIN tb_obat on tb_obat . id_obat = tb_permintaan . id_obat";

              return $this->db->query($queryPermintaan)->row_array();
 		}
 	public function getPermintaanById($id_permintaan){
 			return $this->db->get_where('tb_permintaan', ['id_permintaan' => $id_permintaan])->row_array();
 		}
 		public function editPermintaanObat(){

 		$data = [
	 			"tanggal_permintaan" => $this->input->post('tanggal_permintaan', true),
	 			"id_obat" => $this->input->post('id_obat', true),
	 			"jml_permintaan" => $this->input->post('jml_permintaan', true),
	 		];
	 		$this->db->where('id_permintaan', $this->input->post('id_permintaan'));
	 		$this->db->update('tb_permintaan', $data);
 		}
 		public function hapus_permintaan_obat($id_permintaan){
 		$this->db->where('id_permintaan', $id_permintaan);
 		$this->db->delete('tb_permintaan');
 		}
}

?>



