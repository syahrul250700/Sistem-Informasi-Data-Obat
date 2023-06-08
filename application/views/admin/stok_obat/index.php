<?php  ?>
 <div class="container-fluid">


  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


  
 <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModalSisa">Tambah Data Stok Obat</a>
<?= $this->session->flashdata('message'); ?>

 <?php if(validation_errors()): ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
              <?php endif; ?>
  		 <div class="row">
             <div class="card shadow col-lg-12">
             		<table class="table table-hover" id="datatables">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama</th>
				      <th scope="col">Sisa Obat</th>
				      <th scope="col">Keterangan</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php 	
				  		$querySisa = "SELECT * FROM tb_stok
				  		INNER JOIN tb_obat on tb_obat . id_obat = tb_stok	. id_obat";
				  	 $sisa = $this->db->query($querySisa)->result_array();
				  	 ?> 
				  	<?php $i = 1; ?>
                    <?php foreach ($sisa as $si): ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
                      <td><?= $si['nama_obat']; ?></td>
                      <td><?= $si['sisa_stok']; ?></td>
                      <td><?= $si['ket']; ?></td>
                      <td>
                      	  <a href="<?= base_url(); ?>stok_obat/edit_stok_obat/<?= $si['id_stok'];?>" class="badge badge-warning" onclick >edit</a>
                          <a href="<?= base_url(); ?>stok_obat/hapus_stok_obat/<?= $si['id_stok'];?>" class="badge badge-danger" onclick="return confirm('are you sure you want delete?');">delete</a>
                      </td>
				    </tr>
				    <?php $i++; ?>
                  <?php endforeach; ?>
				  </tbody>
				</table>			
             </div>
         </div>
</div>

</div>
      <!-- End of Main Content -->
      <div class="modal fade" id="myModalSisa" tabindex="-1" role="dialog" aria-labelledby="myModalSisaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalSisaLabel">Tambah Data Sisa Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('stok_obat/tambah_stok_obat'); ?>" method="post">
      <div class="modal-body">
         <div class="form-group">
          <select name="id_obat" id="id_obat" class="form-control">
             <option value=""> Nama Obat</option>
             <?php foreach ($Data_Obat as $do) : ?>
              <option value="<?= $do['id_obat']; ?>"><?= $do['nama_obat'] ?></option>
             <?php endforeach; ?>
           </select>
        </div>
         <div class="form-group">
          <input type="number" class="form-control" id="sisa_stok" name="sisa_stok" placeholder="Sisa Stok">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan">
        </div>
       
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

