<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg-8">  
			<form action="" method="post">
				<input type="hidden" id="id_permintaan" name="id_permintaan" value="<?= $Permintaan_Obat['id_permintaan']; ?>">
				<div class="form-group row">
                  <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_permintaan" name="tanggal_permintaan" value="<?= $Permintaan_Obat['tanggal_permintaan']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="id_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                  <div class="col-sm-10">
                    <select name="id_obat" id="id_obat" class="form-control">
                     <?php foreach ($Data_Obat as $do) : ?>                          
                             <option <?php if($Permintaan_Obat['id_obat'] == $do['id_obat']){echo "selected='selected'";} ?>value="<?= $do['id_obat']; ?>"><?= $do['nama_obat']; ?></option>
                     <?php endforeach; ?>
                   </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jml_permintaan" class="col-sm-2 col-form-label">Jumlah Penerimaan</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="jml_permintaan" name="jml_permintaan" value="<?= $Permintaan_Obat['jml_permintaan']; ?>">
                  </div>
                </div>
                <div class="form-group row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                  </div> 
                </div>
			</form>
		
		</div>	
	</div>

</div>
</div>