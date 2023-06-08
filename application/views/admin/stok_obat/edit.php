<?php  ?>
<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg-8">  
			<form action="" method="post">
				<input type="hidden" id="id_stok" name="id_stok" value="<?= $Stok_Obat['id_stok']; ?>">
                <div class="form-group row">
                  <label for="id_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                  <div class="col-sm-10">
                    <select name="id_obat" id="id_obat" class="form-control">
                     <?php foreach ($Data_Obat as $do) : ?>                          
                             <option <?php if($Stok_Obat['id_obat'] == $do['id_obat']){echo "selected='selected'";} ?>value="<?= $do['id_obat']; ?>"><?= $do['nama_obat']; ?></option>
                     <?php endforeach; ?>
                   </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="sisa_stok" class="col-sm-2 col-form-label">Sisa Stok</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="sisa_stok" name="sisa_stok" value="<?= $Stok_Obat['sisa_stok']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="ket" name="ket" value="<?= $Stok_Obat['ket']; ?>">
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