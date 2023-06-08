<?php  ?>

<div class="container-fluid">


  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?= $this->session->flashdata('message'); ?>

   <?php if(validation_errors()): ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
              <?php endif; ?>

   <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModalPermintaan">Tambah Permintaan Obat</a>

  		 <div class="row">
             <div class="card shadow col-lg-12">
             		<table class="table table-hover" id="datatables">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Tanggal</th>
				      <th scope="col">Nama Obat</th>
				      <th scope="col">Jumlah Permintaan</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
            <?php 
              $queryPermintaan = "SELECT * FROM tb_permintaan
              INNER JOIN tb_obat on tb_obat . id_obat = tb_permintaan . id_obat";

              $Permintaan = $this->db->query($queryPermintaan)->result_array();
             ?>
				  	<?php $i = 1; ?>
                    <?php foreach ($Permintaan as $pm): ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
                      <td><?= $pm['tanggal_permintaan']; ?></td>
                      <td><?= $pm['nama_obat']; ?></td>
                      <td><?= $pm['jml_permintaan']; ?></td>
                      <td>
                        <a href="<?= base_url(); ?>permintaan_obat/edit_permintaan_obat/<?= $pm['id_permintaan'];?>" class="badge badge-warning" onclick >edit</a>
                          <a href="<?= base_url(); ?>permintaan_obat/hapus_permintaan_obat/<?= $pm['id_permintaan'];?>" class="badge badge-danger" onclick="return confirm('are you sure you want delete?');">delete</a>
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

<div class="modal fade" id="myModalPermintaan" tabindex="-1" role="dialog" aria-labelledby="myModalPermintaanLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalPermintaanLabel">Tambah Data Permintaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('permintaan_obat/tambah_permintaan_obat'); ?>" method="post">
      <div class="modal-body">
         
         <div class="form-group">
          <input type="date" class="form-control" id="tanggal_permintaan" name="tanggal_permintaan" placeholder="Tanggal">
        </div>
         <div class="form-group">
          <select name="id_obat" id="id_obat" class="form-control">
             <option value=""> Nama Obat</option>
             <?php foreach ($Data_Obat as $do) : ?>
              <option value="<?= $do['id_obat']; ?>"><?= $do['nama_obat']; ?></option>
             <?php endforeach; ?>
           </select>
        </div>
         <div class="form-group">
          <input type="number" class="form-control" id="jml_permintaan" name="jml_permintaan" placeholder="Jumlah Permintaan">
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
