<link href="<?php echo base_url('assets/DataTables/datatables.min.css');?>" rel="stylesheet">
<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Saldo Per Nasabah</h1>
          </div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard/index' ?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">Data Saldo Per Nasabah</a></li>
          </ol>
        
          <?php echo $this->session->flashdata('alert');?>
            <div class="row mb-3">
                <div class="col">
                
                    <!-- <a class="btn btn-outline-success" data-toggle="modal" data-target="#insertModal"><i class="fa fa-plus"></i>&nbsp;Setor</a> -->
                    <!-- <a class="btn btn-outline-primary"  href="<?php echo base_url().'c_setor/v_insert'?>" >Setor</a> -->
                   
                    <a class="btn btn-outline-primary"  href="<?php echo base_url().'dashboard/index'?>" >Kembali</a>
                </div>
            </div>

          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-8 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Saldo Nasabah </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nasabah Nama</th>
                            <th>Saldo</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach($nasabah as $n ){
                        ?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $n->nasabah_nama?></td>
                            <td><?= "Rp.".number_format($n->nominal_saldo)?></td>
                           
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
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
<script src="<?php echo base_url('assets/DataTables/datatables.js'); ?>"></script>
  <script src="<?php echo base_url('assets/DataTables/datatables.min.js'); ?>"></script>

<script>
new DataTable('#example');

</script>