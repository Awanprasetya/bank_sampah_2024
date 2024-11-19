
<div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Setor Sampah</h1>
          </div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard/index' ?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
            <li class="breadcrumb-item "><a href="#">Setor Sampah</a></li>
            <li class="breadcrumb-item active"><a href="#">Detail Setor Sampah</a></li>
          </ol>
        
         
          <?php echo $this->session->flashdata('alert_1');?>
          <div class="row mb-3">
                <div class="col">
                    <a class="btn btn-outline-primary"  href="<?php echo base_url().'c_setor/index'?>" >Kembali</a>
                </div>
            </div>
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Item</h6>
                </div>
                <div class="row mt-2 ml-1">
                <div class="col">
                <!-- <a class="btn btn-outline-success" data-toggle="modal" data-target="#insertModal"><i class="fa fa-plus"></i>&nbsp;Tambah</a> -->
                </div>
                </div>
                
                <div class="card-body">
               
                <table  id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                        <th>No.</th>
                            <th>Jenis Sampah</th>
                            <th>Kilo Gram (KG)</th>
                            <th>Jumlah Harga</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $grand_total = 0;
                      foreach($nasabah_transaksi_detail as $n ){
                        $kode_transaksi = $n->transaksi_id;
                        $grand_total+= $n->jml_harga;
                        
                        ?>
                        <tr>
                        <td><?= $no++;?></td>
                            <td><?= $n->deskripsi;?></td>
                            <td><?= $n->jml_kg;?></td>
                            <td><?= 'Rp.'.number_format($n->jml_harga);?></td>
                            <!-- <td>
                            <a class="btn btn-danger btn-sm" href=""><i class="fa fa-trash"></i>&nbsp;Hapus</a>
                            </td> -->
                        </tr>
                        <?php }?>
                        <tr>
                          <td colspan="3" style="text-align: right;"><b>Total</b></td>
                          <td><b>Rp.<?= number_format($grand_total);?></b></td>
                        </tr>
                    </tbody>
                </table>
               
                  <form  action="<?php echo base_url().'c_setor/updateTransaksi/'.$kode_transaksi?>" method="post">
                    <div class="row">
                    <div class="col">
                      
                    <span> Deskripsi :</span><br>
                    <textarea name="deskripsi" id="deskripsi" style="width: 400px; height: 100px;"><?php echo $n->keterangan ?></textarea>
                    <input type="num" name="nominal_masuk" id="nominal_masuk" value="<?= $grand_total; ?>" hidden>
                    </div>
                    </div>
                   
                    
                    <!-- <button  type="submit" class="btn btn-outline-primary" ><i class="fa fa-save"></i>&nbsp;Simpan</button>  -->
                    </form>
                    
                    
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



