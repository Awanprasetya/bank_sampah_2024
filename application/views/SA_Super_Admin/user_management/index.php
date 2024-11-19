
 
<link href="<?php echo base_url('assets/DataTables/datatables.min.css');?>" rel="stylesheet">
<div class="container-fluid">
<?php echo $this->session->flashdata('alert_1');?>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Management</h1>
          </div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url().'dashboard/index' ?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
            <li class="breadcrumb-item "><a href="#">Master Data</a></li>
            <li class="breadcrumb-item active"><a href="#">User Management</a></li>
          </ol>
        
          <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=  base_url().'c_user/index' ?>" >Data User</a>
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
            <div class="col-lg-10 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data User </h6>
                </div>
                <div class="card-body">
                <div class="d-flex align-items-start">
  
                    <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama</th>
                            <th>Email </th>
                            <th>User Level </th>
                            <th>Status </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach($get_user as $r ){
                    
                        ?>
                        <tr>
                            <td><?= $no++;?></td>
                            <td><?= $r->nama?></td>
                            <td><?= $r->email?></td>
                            <td><?= $r->user_level?></td>
                            <td><?php if($r->status=="Draft"){?>
                              <span style="color:black;"><?= $r->status?></span>
                              <?php }elseif($r->status=="Aktif"){?>      
                                <span style="color:green;"><?= $r->status?>     </span>
                                <?php }else{ ?>         
                                  <span style="color:red;"><?= $r->status?>    </span> 
                                  <?php }?>            
                            <a class="btn-sm" data-toggle="modal" data-target="#editstatusModal<?= $r->registrasi_id?>"><i class="fa fa-edit" ></i></a>
                            </td>
                            <td align="center">
                              <?php if($this->session->userdata('user_level') == 'U_User'){ ?>
                                <a class="btn btn-info btn-sm" href="<?php echo base_url().'c_user/v_detail/'.$r->registrasi_id?>"><i class="fa fa-eye" ></i>&nbsp;Detail</a>
                           <?php }else{?>
                            <a class="btn btn-info btn-sm" href="<?php echo base_url().'c_user/v_detail/'.$r->registrasi_id?>"><i class="fa fa-eye" ></i>&nbsp;Detail</a>
                                <a class="btn btn-danger btn-sm" onclick = "return confirm('Yakin ingin menghapus data : <?php echo $r->registrasi_id;?>');" href="<?php echo base_url().'c_user/delete/'. $r->registrasi_id;?>" ><i class="fa fa-trash" ></i>&nbsp;Hapus</a>

                            <?php }?>
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
