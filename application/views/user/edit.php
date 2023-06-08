<?php  ?>


<div class="container-fluid">

	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class=" row">
		<div class="col-lg-9">  
			
			<?= form_open_multipart('User/edit_user'); ?>
				
				<div class="form-group row">
					<input type="hidden" id="id" name="id" value="<?= $tb_user['id']; ?>">
                  <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $tb_user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">' , '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="email" name="email" value="<?= $tb_user['email']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $tb_user['tgl_lahir']; ?>">
                     <?= form_error('tgl_lahir', '<small class="text-danger pl-3">' , '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="profesi" class="col-sm-2 col-form-label">Profesi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="profesi" name="profesi" value="<?= $tb_user['profesi']; ?>">
                     <?= form_error('profesi', '<small class="text-danger pl-3">' , '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                  </div> 
                </div>
                </div>

                <div class=" col-lg-3">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Foto Profil</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="col">
                    <div class="row ">
                        <img src="<?= base_url('assets/img/profile/') . $tb_user['image']; ?>" class="card-img-top" >
                      <div class="col">
                        <br>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="image" name="image">
                          <label class=" custom-file-label" for="image">Choose File</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			</form>
		
		
		
			
		
	</div>

</div>
</div>