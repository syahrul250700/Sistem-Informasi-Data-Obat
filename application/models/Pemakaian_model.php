 <?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Pemakaian_model extends CI_Model
 {
 	
 	public function getPemakaianById($id_pemakaian){
 		return $this->db->get_where('tb_pemakaian', ['id_pemakaian' => $id_pemakaian])->row_array();
 	}
 	public function editPemakaianObat(){
 		$data = [
 			    "tanggal_pemakaian" => $this->input->post('tanggal_pemakaian', true),
	 			"id_obat" => $this->input->post('id_obat', true),
	 			"jml_pemakaian" => $this->input->post('jml_pemakaian', true),
 		  ];
 		  $this->db->where('id_pemakaian', $this->input->post('id_pemakaian'));
 		  $this->db->update('tb_pemakaian', $data);
 	}
 	public function hapus_pemakaian_obat($id_pemakaian){
 		$this->db->where('id_pemakaian', $id_pemakaian);
 		$this->db->delete('tb_pemakaian');
 		}
 	
 }
 