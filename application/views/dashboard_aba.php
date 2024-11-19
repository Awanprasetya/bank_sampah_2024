<!-- edit content start here-->

<div class="container-fluid">
          <!-- Page Heading -->
           <?php echo $this->session->flashdata('alert_1');?>
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

<!-- Content Row 1 -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah KRL Terkini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach($get_count_krl as $g): echo $g->jml_krl; endforeach; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h6><b>Jumlah KRL Terkini</b></h6></div>
                      <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah : <span class="badge badge-primary"><?php foreach($get_count_krl as $g): echo $g->jml_krl; endforeach; ?></span></div>
                  
                      <hr>
                      <a class="btn btn-outline-success " href="<?php echo base_url().'c_krl_master/index'?>">Selengkapnya</a>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Peserta Nasabah</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php foreach($get_count_nasabah as $g): echo $g->jml_nasabah; endforeach; ?></div>
                    </div>
                    <hr>
                    <a class="btn btn-outline-primary " href="<?php echo base_url().'c_data_nasabah/index'?>">Selengkapnya</a>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h6><b>Jumlah Peserta Nasabah</b></h6></div>
                      <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah : <span class="badge badge-primary"><?php foreach($get_count_nasabah as $g): echo $g->jml_nasabah; endforeach; ?></span></div>
                  
                      <hr>
                      <a class="btn btn-outline-success " href="<?php echo base_url().'c_data_nasabah/index'?>">Selengkapnya</a>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Seluruh Saldo Nasabah</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php foreach($get_count_nasabah as $g): echo 'Rp.'.number_format($g->jml_saldo); endforeach; ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h6><b>Jumlah Seluruh Saldo Nasabah</b></h6></div>
                      <div class="h7 mb-0 font-weight-bold text-gray-800">Jumlah : <span class="badge badge-primary"><?php foreach($get_count_nasabah as $g): echo 'Rp.'.number_format($g->jml_saldo); endforeach; ?></span></div>
                  
                      <hr>
                      <a class="btn btn-outline-success " href="<?php echo base_url().'c_saldo_nasabah/index'?>">Selengkapnya</a>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Report</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h6><b>Laporan</b></h6></div>
                      <div class="h7 mb-0 font-weight-bold text-gray-800"></div>
                  
                      <hr>
                      <a class="btn btn-outline-success " href="<?php echo base_url().'c_laporan/index'?>">Selengkapnya</a>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            </div>

          <!-- Content Row 1 -->

          <!-- Content Row 2-->
          <div class="row">

            <div class="col-xl-8 col-lg-7">

              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
                  <hr>
                  Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
                </div>
              </div>
            </div>

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr>
                  Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file.
                </div>
              </div>
            </div>
          </div>
		 <!-- oontent row 2-->

</div> <!-- /.container-fluid -->
<!-- end of content-->
</div>