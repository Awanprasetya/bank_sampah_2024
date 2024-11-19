
 
<link href="<?php echo base_url('assets/DataTables/datatables.min.css');?>" rel="stylesheet">
<div class="container-fluid">
<?php echo $this->session->flashdata('alert_1');?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Jenis Sampah</h1>
          </div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard/index' ?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
            <li class="breadcrumb-item "><a href="#">Master Data</a></li>
            <li class="breadcrumb-item active"><a href="#">Jenis Sampah</a></li>
          </ol>
        
          <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="<?=  base_url().'c_jenis_sampah/index' ?>">Data Jenis Sampah Master</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?=  base_url().'c_jenis_sampah_reff/index' ?>" actvie>Data Jenis Sampah Reff</a>
            </li>
            </ul>
            
            <br>
            <div class="row mb-3">
                <div class="col">
                <a class="btn btn-outline-primary"  href="<?php echo base_url().'dashboard/index'?>" >Kembali</a>
                    <a class="btn btn-outline-success" data-toggle="modal" data-target="#insertModal" ><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                </div>
            </div>

          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-8 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Jenis Sampah </h6>
                </div>
                <div class="card-body">
                <div class="d-flex align-items-start">
  
                    <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>ID</th>
                            <th>Jenis Sampah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach($r_sampah as $i ){
                    
                        ?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $i->id?></td>
                            <td><?= $i->deskripsi?></td>
                            <td align="center">
                                <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $i->id?>"><i class="fa fa-edit" ></i>&nbsp;Edit</a>
                                <a class="btn btn-danger btn-sm" onclick = "return confirm('Yakin ingin menghapus data : <?php echo $i->deskripsi;?>');" href="<?php echo base_url().'c_jenis_sampah_reff/delete/'. $i->id;?>" ><i class="fa fa-trash" ></i>&nbsp;Hapus</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                </div>
                </div>
              </div>          
            </div>

          </div>
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
