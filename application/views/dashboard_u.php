<!-- edit content start here-->

<div class="container-fluid">
<?php echo $this->session->flashdata('alert_1');?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

<!-- Content Row 1 -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Saldo Terkini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach($sum_nasabah_saldo_id as $g): echo 'Rp.'.number_format($g->jml_saldo); endforeach; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-wallet fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Content Row 1 -->

          <!-- Content Row 2-->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Menu</h6>
                </div>
                <div class="card-body">
                <div class="row">

                  <!-- Earnings (Monthly) Card Example -->
                  
                  <div class="col-xl-6 col-md-6 mb-4 ">
                  <a class="button" href="<?php echo base_url().'c_setor/index'?>">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1" >Transaksi</div>
                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> -->
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-cart-arrow-down fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    </a>
                  </div>
                  <div class="col-xl-6 col-md-6 mb-4">
                  <a class="button" href="<?= base_url().'c_tarik_saldo/index'?>">
                    <div class="card border-left-warning shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">Penarikan Saldo</div>
                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> -->
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-money-bill fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Riwayat Penarikan Saldo</div>
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-cart-arrow-down fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Transaksi</div>
                          </div>
                          <div class="col-auto">
                            <i class="fa fa-cart-arrow-down fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> -->

                  </div>
                </div>
              </div>          
            </div>

            <!-- <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Pending Matters</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

            </div> -->
          </div>
		 <!-- oontent row 2-->

</div> <!-- /.container-fluid -->
<!-- end of content-->
</div>


