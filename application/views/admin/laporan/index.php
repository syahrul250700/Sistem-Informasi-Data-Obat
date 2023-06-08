<?php  ?>

 <div class="container-fluid">


  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <!-- <a class="btn btn-success mb-2" href="<?= base_url('laporan/excel'); ?>"><i class=" fa fa-file-excel"></i> Export to EXCEL</a>
  <a class="btn btn-danger mb-2" href="<?= base_url('laporan/print'); ?>"><i class=" fa fa-print"></i> Print</a>

  		 <div class="row">

             <div class=" card shadow col-lg-12">
             		<table class="table table-hover" id="datatables">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Tanggal</th>
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
							      <td><?= $lp['tanggal']; ?></td>
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
             </div>
         </div> -->

<div class="row">
            <!-- row satu  -->
            <div class="col-lg-5" >
                <div class="card shadow">
                    <div class="card-header">
                    <strong>Form</strong> Filter Data Obat
                    </div>
                    <!--id formfilter adalah nama form untuk filter-->
                    <form id="formfilter">
                        <div class="card-body card-block">
                            <input name="valnilai" type="hidden">
                            <div class="row form-group">
                                <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">Pilih Periode By</label></div>
                                <div class="col-12 col-md-9">
                                <select name="periode" id="periode" class="form-control form-control-user" title="Pilih Tahun Ajaran">
                                    <option value="">-PILIH-</option>
                                    <option value="tanggal">Tanggal</option>
                                    <option value="bulan">Bulan</option>
                                    <option value="tahun">Tahun</option>
                                </select>
                                <small class="help-block form-text"></small>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">

                        <!--ketika di klik tombol Proses, maka akan mengeksekusi fungsi javascript prosesPeriode() , untuk menampilkan form-->

                        <button id="btnproses" type="button" onclick="prosesPeriode()" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Proses</button>

                         <!--ketika di klik tombol Reset, maka akan mengeksekusi fungsi javascript prosesReset() , untuk menyembunyikan form-->
                        <button onclick="prosesReset()" type="button" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                            
                        </div>
                    </form>
                </div>
            </div>

            <!-- row kedua  -->
            <div class="col-lg-7" id="tanggalfilter">
                <div class="card shadow">
                    <div class="card-header">
                    <strong>Form</strong> Filter by Tanggal
                    </div>
                    <form action="<?= base_url(); ?>Laporan/filter" method="post" target="_blank">
                    <input type="hidden" name="nilaifilter" value="1">

                    <input name="valnilai" type="hidden">
                        <div class="card-body card-block">

                            <div class="row form-group">
                                <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Dari tanggal</label>
                                </div>
                                <div class="col col-md-4">
                                        <input name="tanggalawal" value="" type="date"  class="form-control"  placeholder="Inputkan Jenis Bayar" id="tanggalawal" required="">
                                </div>
                                <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Sampai tanggal</label>
                                </div>
                                <div class="col col-md-4">
                                        <input name="tanggalakhir" value="" type="date"  class="form-control"  placeholder="Inputkan Jenis Bayar" id="tanggalakhir" required="">
                                </div>
                                <small class="help-block form-text"></small>
                            </div>

                        </div>
                        <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-print"></i> Print</button>
                        
                        </div>
                    </form>
                </div>
            </div>

            <!-- row ketiga  -->
            <div class="col-lg-7" id="bulanfilter">
                <div class="card shadow">
                    <div class="card-header">
                    <strong>Form</strong> Filter by Bulan
                    </div>
                    <form id="formbulan" action="<?= base_url(); ?>Laporan/filter" method="post" target="_blank">
                        <div class="card-body card-block">
                            <input type="hidden" name="nilaifilter" value="2">

                            <input name="valnilai" type="hidden">
                            <div class="row form-group">
                                <div id="form-tanggal" class="col col-md-2"><label for="select" class=" form-control-label">Pilih Tahun</label></div>
                                <div class="col-12 col-md-10">
                                <select name="tahun1" id="tahun1" class="form-control form-control-user" title="Pilih Tahun">
                                    <option value="">-PILIH-</option>
                                    <?php foreach($tahun as $thn): ?>
                                    <option value="<?= $thn->tahun; ?>"><?= $thn->tahun; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="help-block form-text"></small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="select" class=" form-control-label">Dari bulan</label>
                                </div>
                                <div class="col col-md-4">
                                    <select name="bulanawal" id="bulanawal" class="form-control form-control-user" title="Pilih Bulan">
                                        <option value="">-PILIH-</option>
                                        <option value="1">JANUARI</option>
                                        <option value="2">FEBRUARI</option>
                                        <option value="3">MARET</option>
                                        <option value="4">APRIL</option>
                                        <option value="5">MEI</option>
                                        <option value="6">JUNI</option>
                                        <option value="7">JULI</option>
                                        <option value="8">AGUSTUS</option>
                                        <option value="9">SEPTEMBER</option>
                                        <option value="10">OKTOBER</option>
                                        <option value="11">NOVEMBER</option>
                                        <option value="12">DESEMBER</option>
                                    </select>
                                </div>
                                <div class="col col-md-2">
                                        <label for="select" class=" form-control-label">Sampai bulan</label>
                                </div>
                                <div class="col col-md-4">
                                    <select name="bulanakhir" id="bulanakhir" class="form-control form-control-user" title="Pilih Bulan">
                                        <option value="">-PILIH-</option>
                                        <option value="1">JANUARI</option>
                                        <option value="2">FEBRUARI</option>
                                        <option value="3">MARET</option>
                                        <option value="4">APRIL</option>
                                        <option value="5">MEI</option>
                                        <option value="6">JUNI</option>
                                        <option value="7">JULI</option>
                                        <option value="8">AGUSTUS</option>
                                        <option value="9">SEPTEMBER</option>
                                        <option value="10">OKTOBER</option>
                                        <option value="11">NOVEMBER</option>
                                        <option value="12">DESEMBER</option>
                                    </select>
                                </div>
                                <small class="help-block form-text"></small>
                                
                            </div>

                        </div>
                        <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-print"></i> Print</button>
                        
                        </div>
                    </form>
                </div>
            </div>

            <!-- row keempat  -->
            <div class="col-lg-7" id="tahunfilter">
                <div class="card shadow">
                    <div class="card-header">
                    <strong>Form</strong> Filter by Tahun
                    </div>
                    <form id="formtahun" action="<?= base_url(); ?>Laporan/filter" method="post" target="_blank">
                    <input name="valnilai" type="hidden">
                        <div class="card-body card-block">

                            <input type="hidden" name="nilaifilter" value="3">

                            <div class="row form-group">
                                <div id="form-tanggal" class="col col-md-2"><label for="select" class=" form-control-label">Pilih Tahun</label></div>
                                <div class="col-12 col-md-10">
                                <select name="tahun2" id="tahun2" class="form-control form-control-user" title="Pilih Tahun">
                                    <option value="">-PILIH-</option>
                                    <?php foreach($tahun as $thn): ?>
                                    <option value="<?= $thn->tahun; ?>"><?= $thn->tahun; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="help-block form-text"></small>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-print"></i> Print</button>
                        
                        </div>
                    </form>
                </div>
            </div>

         </div>
           
</div> 

</div>
      <!-- End of Main Content -->




