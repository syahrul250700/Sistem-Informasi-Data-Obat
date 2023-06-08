<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Laporan_model extends CI_Model
 {
 	function tampil_laporan()
 	{
		$queryLaporan = "SELECT * FROM tb_obat
				  		INNER JOIN tb_pemakaian on tb_pemakaian . id_obat = tb_obat	. id_obat
				  		INNER JOIN tb_penerimaan on tb_penerimaan . id_obat	= tb_obat . id_obat	
				  		INNER JOIN tb_permintaan on tb_permintaan . id_obat	 = tb_obat	. id_obat	
				  		INNER JOIN tb_stok on tb_stok . id_obat	 = tb_obat	. id_obat";

		return $this->db->query($queryLaporan);
 	}
 	function getTahun(){
 		$query = $this->db->query("SELECT YEAR(tanggal_pemakaian) AS tahun FROM tb_pemakaian
 		INNER JOIN tb_obat on tb_obat . id_obat = tb_pemakaian	. id_obat
 		INNER JOIN tb_penerimaan on tb_penerimaan . id_obat	= tb_pemakaian . id_obat
 		INNER JOIN tb_permintaan on tb_permintaan . id_obat	 = tb_pemakaian	. id_obat
 		INNER JOIN tb_stok on tb_stok . id_obat	 = tb_pemakaian	. id_obat
 		GROUP BY YEAR(tanggal_pemakaian) ORDER BY YEAR(tanggal_pemakaian) ASC"); 

 		return $query->result();
 	}
 	function filterByTanggal($tanggalawal,$tanggalakhir){
 		
 		$query = $this->db->query("SELECT * FROM tb_pemakaian
 		  INNER JOIN tb_obat on tb_obat . id_obat = tb_pemakaian . id_obat
 		  INNER JOIN tb_penerimaan on tb_penerimaan . id_obat	= tb_pemakaian . id_obat
 		  INNER JOIN tb_permintaan on tb_permintaan . id_obat	 = tb_pemakaian	. id_obat
 		  INNER JOIN tb_stok on tb_stok . id_obat	 = tb_pemakaian	. id_obat
 		  WHERE tanggal_pemakaian BETWEEN '$tanggalawal' AND '$tanggalakhir' ORDER BY tanggal_pemakaian ASC"); 

 		return $query->result();
 	}
 	function filterByBulan($tahun1,$bulanawal,$bulanakhir){
 		
 		$query = $this->db->query("SELECT * FROM tb_pemakaian
          INNER JOIN tb_obat on tb_obat . id_obat = tb_pemakaian . id_obat
 		  INNER JOIN tb_penerimaan on tb_penerimaan . id_obat	= tb_pemakaian . id_obat
 		  INNER JOIN tb_permintaan on tb_permintaan . id_obat	 = tb_pemakaian	. id_obat
 		  INNER JOIN tb_stok on tb_stok . id_obat	 = tb_pemakaian	. id_obat
 		  WHERE YEAR(tanggal_pemakaian) = '$tahun1' AND MONTH(tanggal_pemakaian) BETWEEN '$bulanawal' AND '$bulanakhir' ORDER BY tanggal_pemakaian ASC"); 

 		return $query->result();
 	}
 	function filterByTahun($tahun2){
 		
 		$query = $this->db->query("SELECT * FROM tb_pemakaian 
 		  INNER JOIN tb_obat on tb_obat . id_obat = tb_pemakaian	. id_obat
 		  INNER JOIN tb_penerimaan on tb_penerimaan . id_obat	= tb_pemakaian . id_obat
 		  INNER JOIN tb_permintaan on tb_permintaan . id_obat	 = tb_pemakaian	. id_obat
 		  INNER JOIN tb_stok on tb_stok . id_obat	 = tb_pemakaian	. id_obat
 		  WHERE YEAR(tanggal_pemakaian) = '$tahun2' ORDER BY tanggal_pemakaian ASC"); 
 		
 		return $query->result();
 	}

 }