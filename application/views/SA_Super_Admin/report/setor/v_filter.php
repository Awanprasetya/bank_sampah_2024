
<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Riwayat Transaksi</h1>
          </div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard/index' ?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">Riwayat Transaksi </a></li>
          </ol>
        
          <?php echo $this->session->flashdata('alert_1');?>
            <div class="row mb-3">
                <div class="col">
                
                    <!-- <a class="btn btn-outline-success" data-toggle="modal" data-target="#insertModal"><i class="fa fa-plus"></i>&nbsp;Setor</a> -->
                    <!-- <a class="btn btn-outline-primary"  href="<?php echo base_url().'c_setor/v_insert'?>" >Setor</a> -->
                   
                    
                    <a class="btn btn-outline-primary"  href="<?php echo base_url().'dashboard/index'?>" >Kembali</a>
                    <!-- <button  class="btn btn-outline-success" data-toggle="modal" data-target="#insertModal">Tarik Saldo</button> -->
                    </form>
                </div>
            </div>
  <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=  base_url().'c_report/v_setor' ?>">Setor Sampah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?= base_url().'c_report/v_tarik'?>">Penarikan Saldo</a>
            </li>
            </ul>
            <br>
            <!-- <div class="row mb-3">
                <div class="col">
                <a class="btn btn-outline-primary"  href="<?php echo base_url().'dashboard/index'?>" >Kembali</a>
                    <a class="btn btn-outline-success" data-toggle="modal" data-target="#insertModal" ><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                </div>
            </div> -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-10 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Riwayat Transaksi - Penarikan Saldo </h6>
                
                </div>
                
                <div class="card-body">
                <form method="post" action="<?php echo base_url('c_report/filter_setor'); ?>">
                    <div class="row mb-3">
                        <div class="col">
                    <label for="start_date">Filter :</label>
                    <input type="date" id="start_date" name="start_date" >
                    <label for="end_date">To</label >
                    <input type="date" id="end_date" name="end_date">
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </form>
                </div>
                </div>
                    <div class="table-responsive">
                <table class="table table-bordered table-striped mb-none">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No. Transaksi</th>
                            <th>Nasabah Nama</th>
                            <th>Nominal Masuk</th>
                            <th>Status</th>
                            <?php if($this->session->userdata('user_level') == 'SA_SuperAdmin'){?> 
                            <th>Action</th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($results as $n ){
                        $kode_transaksi = $n->transaksi_id;
                        ?>
                        <tr>
                            <td><?= $n->tanggal?></td>
                            <td><?= $n->transaksi_id?></td>
                            <td><?= $n->nasabah_nama?></td>
                            <td><?= "Rp.".number_format($n->nominal_keluar)?></td>
                            <td>
                              <?= $n->status?>
                              <a class="btn-sm" data-toggle="modal" data-target="#editstatusModal<?= $kode_transaksi?>"><i class="fa fa-edit" ></i></a>
                            </td>
                            <?php if($this->session->userdata('user_level') == 'SA_SuperAdmin'){?>
                            <td>                                
                              <!-- <a class="btn btn-info btn-sm" href="<?php echo base_url().'c_setor/v_detail/'.$kode_transaksi;?>"><i class="fa fa-eye" ></i>&nbsp;Detail</a> -->
                             
                              <a id="btn" class="btn btn-danger btn-sm" href="<?= base_url().'c_tarik_saldo/delete_transaksi/'.$kode_transaksi;?>" onclick="return confirm('Yakin ingin menghapus transaksi ini : <?php echo $kode_transaksi;?> ?');"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                                
                            </td>
                            <?php }?>
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


