<?php  ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                  <div class="row">
                    <div class="col-md-8">
                       <?= $this->session->flashdata('message'); ?>
                    </div>
                  </div>
                <div class="card mb-3" style="width: 1000px; ">
				  <div class="row no-gutters">
				    <div class="col-md-4">
				      <img src="<?= base_url('assets/img/profile/') . $tb_user['image']; ?>" class="card-img" alt="...">
				    </div>
				    <div class="col-md-8">
                <div class="card-body shadow">
                  
                  <p class="card-text">Nama  : <?= $tb_user['name']; ?></p>
                  <p class="card-text">Email : <?= $tb_user['email']; ?></p>
                  <p class="card-text">Tanggal Lahir :  <?= $tb_user['tgl_lahir']; ?></p>
                  <p class="card-text">Profesi : <?= $tb_user['profesi']; ?></p>
                  <p class="card-text"><small class="text-muted">Telah menjadi member baru ditanggal  <?= date('d F Y', $tb_user['date_created']); ?></small></p>
                  <a href="<?= base_url(); ?>user/edit_user/<?= $tb_user['id'];?>" class="btn btn-primary">Edit Profile</a>
                </div>
              </div>
				  </div>
				</div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

 


