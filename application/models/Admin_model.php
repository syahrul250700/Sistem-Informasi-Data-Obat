<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Admin_model extends CI_Model
 {
 	public function get_sum_penerimaan()
 	{
 		$this->db->select_sum('jml_penerimaan','jmlPenerimaan');
 		$this->db->from('tb_penerimaan');
 		return $this->db->get()->row();
 	}
 	public function get_sum_pemakaian()
 	{
 		$this->db->select_sum('jml_pemakaian','jmlPemakaian');
 		$this->db->from('tb_pemakaian');
 		return $this->db->get()->row();
 	}
 	public function get_sum_permintaan()
 	{
 		$this->db->select_sum('jml_permintaan','jmlPermintaan');
 		$this->db->from('tb_permintaan');
 		return $this->db->get()->row();
 	}
 	public function get_sum_obat()
 	{
 		$this->db->select_sum('stok_awal','stokAwal');
 		$this->db->from('tb_obat');
 		return $this->db->get()->row();
 	}
 	public function get_sum_stok()
 	{
 		$this->db->select_sum('sisa_stok','sisaStok');
 		$this->db->from('tb_stok');
 		return $this->db->get()->row();
 	}
 }

