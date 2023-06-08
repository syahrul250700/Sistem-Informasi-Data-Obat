<?php  
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename = $title.xls");

header("Pragma: no-cache");

header("Expires: o");
?>

<table border="1" cellpadding="10" cellspacing="0" >
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Obat</th>
				      <th scope="col">Satuan</th>
				      <th scope="col">Stok Awal</th> 
				      <th scope="col">Penerimaan</th>
				      <th scope="col">Persediaan</th>
				      <th scope="col">Pemakaian</th>
				      <th scope="col">Sisa Obat</th>
				      <th scope="col">Permintaan</th>
				      <th scope="col">Pemberian</th>
				      <th scope="col">Keterangan</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<!-- JOIN TABEL -->
				  	<?php 	
				  		$queryLaporan = "SELECT * FROM tb_obat
				  		INNER JOIN tb_pemakaian on tb_pemakaian . id_obat = tb_obat	. id_obat
				  		INNER JOIN tb_penerimaan on tb_penerimaan . id_obat	= tb_obat . id_obat	
				  		INNER JOIN tb_permintaan on tb_permintaan . id_obat	 = tb_obat	. id_obat	
				  		INNER JOIN tb_stok on tb_stok . id_obat	 = tb_obat	. id_obat";

				  	 $laporan = $this->db->query($queryLaporan)->result_array();

				  	 ?>
				  	 <?php $i = 1; ?>
			                    <?php foreach ($laporan as $lp): ?>
							    <tr>
							      <th scope="row"><?= $i; ?></th>
			                      <td><?= $lp['nama_obat']; ?></td>
			                      <td><?= $lp['satuan']; ?></td>
			                      <td><?= $lp['stok_awal']; ?></td> 
			                      <td><?= $lp['jml_penerimaan']; ?></td>
			                      <td><?= $lp['stok_awal']; ?></td>
			                      <td><?= $lp['jml_pemakaian']; ?></td>
			                      <td><?= $lp['sisa_stok']; ?></td>
			                      <td><?= $lp['jml_permintaan']; ?></td>
			                      <td><?= $lp['jml_pemakaian']; ?></td>
			                      <td><?= $lp['ket']; ?></td>
			                
							    </tr>
							    <?php $i++; ?>
			                  <?php endforeach; ?>
				  </tbody>
				</table>
				<br>
				<div>
					<ul class="list-inline">
						<li>
							<p>MENGETAHUI,
							<br>KEPALA UPT PUSKESMAS KUALA ENOK
							<br><br><br><br>
							<u>H.Muhammad Syum, SKM. MM</u>
							<br>NIP.19721206 199201 1 001</p>
						</li>
						<li>
							<p>DIPERIKSA OLEH:
							<br>DOKTER UPT
							<br><br><br><br>
							<u>dr.Aulia Rahmadhani</u>
							<br>NIP.19880417 201412 2 001</p>
						</li>
						<li>
							<p>Kuala enok, <?= (date('d m Y')) ?></p>
							<p>PENGELOLA LPLPO PUSKESMAS:
							<br>
							<br><br><br><br>
							<u>apt.Ikbal Maulidin, S.Farm</u>
						</li>
					</ul>						
				</div>
					
				