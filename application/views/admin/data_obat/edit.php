
<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg-8">  
			
			<form action="" method="post">
				
				<div class="form-group row">
					<input type="hidden" id="id_obat" name="id_obat" value="<?= $Data_Obat['id_obat']; ?>">
                  <label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $Data_Obat['nama_obat']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="satuan" name="satuan" value="<?= $Data_Obat['satuan']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="stok_awal" class="col-sm-2 col-form-label">Stok Awal</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="stok_awal" name="stok_awal" value="<?= $Data_Obat['stok_awal']; ?>">
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