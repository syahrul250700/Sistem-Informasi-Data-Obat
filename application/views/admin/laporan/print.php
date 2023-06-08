<!DOCTYPE html>
<html><head>

	<title>Laporan Data Obat <?= $subtitle; ?></title>
	
</head><body onload="window.print()">

<!-- <table style="width:100%;">
	<img src="<?= base_url(''); ?>assets/img/logo.png" style="position: absolute; width: 80px; margin: 50px 0 0 900px;">
	<img src="<?= base_url(''); ?>assets/img/inhil.png" style="position: absolute; width: 70px; margin-top: 50px;">
	<tr>
		<td align="center">

			<span style=" font-weight: bold;">
				<h3>PEMERINTAH KABUPATEN INDRAGIRI HILIR
				<br>DINAS KESEHATAN
				<br>UPT PUSKESMAS KUALA ENOK 
				<br>Tanah Merah, Indragiri Hilir, RIAU </h3> 
			</span>
		</td>
	</tr>
	<br><br>
</table>
<hr class="line-title">	 -->
<!-- <table>
	<tr>
			<td>
			<h5 align="left" style=" margin: 3px 0 0 40px; font-family: arial;">KODE PUSKESMAS : 14020401</h5>
			<h5 align="left" style=" margin: 3px 0 0 40px; font-family: arial;">PUSKESMAS      : KUALA ENOK</h5>
			<h5 align="left" style=" margin: 3px 0 0 40px; font-family: arial;">KECAMATAN      : TANAH MERAN</h5>
			<h5 align="left" style=" margin: 3px 0 0 40px; font-family: arial;">KABUPATEN      : INDRAGIRI HILIR</h5>
			<h5 align="left" style=" margin: 3px 0 0 40px; font-family: arial;">PROVINSI       : RIAU</h5>
			</td>
			<td >
			<p align="right">
			<h5 style=" margin: 3px 0 0 40px; font-family: arial;"><?= $subtitle; ?></h5>
			<h5  style=" margin: 3px 0 0 40px; font-family: arial;">TAHUN      : <?= date('Y'); ?></h5></p>
			</td>
	</tr>		 
</table> -->
						<table>
							<tr>
								<td>
							<p>
								<h5 style=" margin: 3px 0 0 40px; font-family: arial;">KODE PUSKESMAS : 14020401</h5>
								<h5 style=" margin: 3px 0 0 40px; font-family: arial;">PUSKESMAS      : KUALA ENOK</h5>
								<h5 style=" margin: 3px 0 0 40px; font-family: arial;">KECAMATAN      : TANAH MERAN</h5>
								<h5 style=" margin: 3px 0 0 40px; font-family: arial;">KABUPATEN      : INDRAGIRI HILIR</h5>
								<h5 style=" margin: 3px 0 0 40px; font-family: arial;">PROVINSI       : RIAU</h5>
							</p>
							</td>
							<td>
							<p>
								<h5 style=" margin: 3px 0 0 40px; font-family: arial;"><?= $subtitle; ?></h5>
			                    <h5  style=" margin: 3px 0 0 40px; font-family: arial;">TAHUN      : <?= date('Y'); ?></h5>
							</p>
						</td>
							</tr>
							
						</table>							
						
					<br>
			 
	
				<table border="1" cellpadding="1" cellspacing="0" style="font-size: 12px; font-family: arial;" align="center">
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
				      <th scope="col">Keterangan</th>
				    </tr>
				  </thead>
				  <tbody>
				  	 <?php $i = 1; ?>
			                    <?php foreach ($datafilter as $row): ?>
							    <tr>
							      <th scope="row"><?= $i; ?></th>
			                      <td><?= $row->nama_obat; ?></td>
			                      <td><?= $row->satuan; ?></td>
			                      <td><?= $row->stok_awal; ?></td> 
			                      <td><?= $row->jml_penerimaan; ?></td>
			                      <td><?= $row->stok_awal; ?></td>
			                      <td><?= $row->jml_pemakaian; ?></td>
			                      <td><?= $row->sisa_stok; ?></td>
			                      <td><?= $row->jml_permintaan; ?></td>
			                      <td><?= $row->ket; ?></td>
			                
							    </tr>
							    <?php $i++; ?>
			                  <?php endforeach; ?>
				  </tbody>
				</table>
				<br>
				<table align="center" style="font-family: arial;">
					<tr>
						<td>
							<p align="left" style="font-size: 12px;">MENGETAHUI,
							<br>KEPALA UPT PUSKESMAS KUALA ENOK <br>
							<img src="<?= base_url('assets/img/syum.jpg'); ?>"style="max-width:70px;"><br>
							<u>H.Muhammad Syum, SKM. MM</u>
							<br>NIP.19721206 199201 1 001</p>
						</td>
						<td>
							<p align="center" style="font-size: 12px;">DIPERIKSA OLEH:
							<br>DOKTER UPT <br>	
							<img src="<?= base_url('assets/img/aulia.png'); ?>"style="max-width:70px;"><br>
							<u>dr.Aulia Rahmadhani</u>
							<br>NIP.19880417 201412 2 001</p>
						</td>
						<td>
							<p align="center" style="font-size: 12px;">Kuala enok, <?= (date('d F Y')); ?>
							<br>PENGELOLA LPLPO PUSKESMAS:<br>
							<img src="<?= base_url('assets/img/ikbal.jpg'); ?>"style="max-width:70px;"><br>
							<u>apt.Ikbal Maulidin, S.Farm</u></p>
							
						</td>
					</tr>
				</table>
				
				

</body></html>