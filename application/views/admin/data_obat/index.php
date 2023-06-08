<?php  ?>

 <div class="container-fluid">


  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?= $this->session->flashdata('message'); ?>

  <?php if(validation_errors()): ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
              <?php endif; ?>

  <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModalObat">Tambah Data Obat</a>

  		 <div class="row">

             <div class="card shadow col-lg-12">
              
             		<table class="table table-hover" id="datatables">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Obat</th>
				      <th scope="col">Satuan</th>
				      <th scope="col">Stok Awal</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
                    <?php foreach ($Data_Obat as $do): ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
                      <td><?= $do['nama_obat']; ?></td>
                      <td><?= $do['satuan']; ?></td>
                      <td><?= $do['stok_awal']; ?></td>
                      <td>
                          <a href="<?= base_url(); ?>data_obat/edit_data_obat/<?= $do['id_obat'];?>" class="badge badge-warning">edit</a>
                          <a href="<?= base_url(); ?>data_obat/hapus_data_obat/<?= $do['id_obat'];?>" class="badge badge-danger" onclick="return confirm('are you sure you want delete?');">delete</a>
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

      <!-- Modal -->
<div class="modal fade" id="myModalObat" tabindex="-1" role="dialog" aria-labelledby="myModalObatLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalObatLabel">Tambah Data Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('data_obat/tambah_data_obat'); ?>" method="post">
      <div class="modal-body">
         
         <div class="form-group">
          <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Nama Obat">
        </div>
         <div class="form-group">
           <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan">
         </div>
         <div class="form-group">
          <input type="number" class="form-control" id="stok_awal" name="stok_awal" placeholder="Stok Awal">
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

