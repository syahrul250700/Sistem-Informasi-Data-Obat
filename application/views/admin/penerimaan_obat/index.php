<?php  ?>

<div class="container-fluid">


  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModalPenerimaan">Tambah Penerimaan Obat</a>

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
				      <th scope="col">Tanggal</th>
				      <th scope="col">Nama Obat</th>
				      <th scope="col">Jumlah Penerimaan</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
            <?php 
              $queryPenerimaan = "SELECT * FROM tb_penerimaan
              INNER JOIN tb_obat on tb_obat . id_obat = tb_penerimaan . id_obat";

              $Penerimaan = $this->db->query($queryPenerimaan)->result_array();
             ?>
				  	<?php $i = 1; ?>
                    <?php foreach ($Penerimaan as $pn): ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
                      <td><?= $pn['tanggal_penerimaan']; ?></td>
                      <td><?= $pn['nama_obat']; ?></td>
                      <td><?= $pn['jml_penerimaan']; ?></td>
                      <td>
                          <a href="<?= base_url(); ?>penerimaan_obat/edit_penerimaan_obat/<?= $pn['id_penerimaan'];?>" class="badge badge-warning">edit</a>
                          <a href="<?= base_url(); ?>penerimaan_obat/hapus_penerimaan_obat/<?= $pn['id_penerimaan'];?>" class="badge badge-danger" onclick="return confirm('are you sure you want delete?');">delete</a>
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
      <div class="modal fade" id="myModalPenerimaan" tabindex="-1" role="dialog" aria-labelledby="myModalPenerimaanLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalPenerimaanLabel">Tambah Data Penerimaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('penerimaan_obat/tambah_penerimaan_obat'); ?>" method="post">
      <div class="modal-body">
         <div class="form-group">
          <input type="date" class="form-control" id="tanggal_penerimaan" name="tanggal_penerimaan" placeholder="Tanggal">
        </div>
         <div class="form-group">
          <select name="id_obat" id="id_obat" class="form-control">
             <option value=""> Nama Obat</option>
             <?php foreach ($Data_Obat as $do) : ?>
              <option value="<?= $do['id_obat']; ?>"><?= $do['nama_obat'] ?></option>
             <?php endforeach; ?>
           </select>
        </div>
         <div class="form-group">
          <input type="number" class="form-control" id="jml_penerimaan" name="jml_penerimaan" placeholder="Jumlah Penerimaan">
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





