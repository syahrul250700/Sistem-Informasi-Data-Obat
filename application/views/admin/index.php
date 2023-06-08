<?php  ?>
<style type="text/css">

</style>

 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Obat Masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sum_penerimaan->jmlPenerimaan ; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Obat Keluar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sum_pemakaian->jmlPemakaian ; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Jenis Obat</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $this->db->query("SELECT nama_obat FROM tb_obat")->num_rows(); ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Permintaan Obat</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sum_permintaan->jmlPermintaan ; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          

             <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-6">
              <div class="card shadow mb-5">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Visi dan Misi PUSKESMAS KUALA ENOK</h6>
                  <div class="dropdown no-arrow">
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body" style="background-image:url('assets/img/kecil.png');" >
                   <div class="chart-area" >
                   <p class="font-weight-bold text-gray-300" align="center" style="font-size: 12px; line-height: 0px;" >Visi</p>
                   <p class="font-weight-bold text-gray-300" align="center" style="font-size: 12px; line-height: 0px;">Terwujudnya Hidup Sehat Wilayah UPT Puskesmas Kuala Enok dengan Pelayanan Prima.</p>
                   <p class="font-weight-bold text-gray-300" align="center" style="font-size: 12px; ">Misi</p>
                   <p class="font-weight-bold text-gray-300" align="center" style="font-size: 12px; line-height: 0px;">Menyelenggarakan pelayanan yang berkualitas </p>
                   <p class="font-weight-bold text-gray-300" align="center" style="font-size: 12px;">Menggerakkan kesehatan masyarakat berperilaku hidup bersih serta mendorong kemandirian untuk hidup sehat bagi keluarga dan masyarakat wilayah UPT Puskesmas Kuala Enok</p>
                   <p class="font-weight-bold text-gray-300" align="center" style="font-size: 12px;">Mengaktifkan dan memberdayakan masyarakat maupun individu dan keluarga dalam upaya hidup bersih dan sehat</p>
                   <p class="font-weight-bold text-gray-300" align="center" style="font-size: 12px;">Menggalang dan meningkatkan kerjasama lintas sektoral dalam mensukseskan kelancaran pelayanan sesuai dengan target Standar Pelayanan Minimal (SPM) bidang kesehatan Kab. Indragiri Hilir.</p>
                   <p class="font-weight-bold text-gray-300" align="center" style="font-size: 12px;">Memelihara dan meningkatkan kesehatan perorangan, keluarga dan masyarakat beserta lingkungan</p>
                   <p class="font-weight-bold text-gray-300" align="center" style="font-size: 12px;">Menciptakan tata kelola organisasi puskesmas yang baik</p>  
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-5 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Penggunaan Obat</h6>
                  <div class="dropdown no-arrow">
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Total Pemakaian
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Total Stok Awal
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Sisa Stok
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- Page level plugins -->
  