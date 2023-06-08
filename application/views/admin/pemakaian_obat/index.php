<?php  ?>

<div class="container-fluid">


  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?= $this->session->flashdata('message'); ?>

   <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#myModalObat">Tambah Data Pemakaian Obat</a>

  		 <div class="row">
             <div class=" card shadow col-lg-12">
              <?php  ?>
             		<table class="table table-hover" id="datatables">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Tanggal</th>
				      <th scope="col">Nama Obat</th>
				      <th scope="col">Jumlah Pemakaian</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
            <?php 
              $queryPemakaian = "SELECT * FROM tb_pemakaian
              INNER JOIN tb_obat on tb_obat . id_obat = tb_pemakaian . id_obat";

              $Pemakaian = $this->db->query($queryPemakaian)->result_array();
             ?>
				  	<?php $i = 1; ?>
                    <?php foreach ($Pemakaian as $pk): ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
                      <td><?= $pk['tanggal_pemakaian']; ?></td>
                      <td><?= $pk['nama_obat']; ?></td>
                      <td><?= $pk['jml_pemakaian']; ?></td>
                      <td>
                          <a href="<?= base_url(); ?>pemakaian_obat/edit_pemakaian_obat/<?= $pk['id_pemakaian'];?>" class="badge badge-warning" onclick >edit</a>
                          <a href="<?= base_url(); ?>pemakaian_obat/hapus_pemakaian_obat/<?= $pk['id_pemakaian'];?>" class="badge badge-danger" onclick="return confirm('are you sure you want delete?');">delete</a>
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

<div class="modal fade" id="myModalObat" tabindex="-1" role="dialog" aria-labelledby="myModalObatLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalObatLabel">Tambah Data Pemakaian Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url("pemakaian_obat/tambah_pemakaian") ?>" method="post">
      <div class="modal-body">
         
          <div class="form-group">
          <input type="date" class="form-control" id="tanggal_pemakaian" name="tanggal_pemakaian" placeholder="tanggal pemakaian">
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
          <input type="number" class="form-control" id="jml_pemakaian" name="jml_pemakaian" placeholder="Jumlah Pemakaian">
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
