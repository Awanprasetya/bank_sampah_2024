
 
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
            <li class="breadcrumb-item "><a href="#">User Management</a></li>
            <li class="breadcrumb-item active"><a href="#">Detail</a></li>
          </ol>
        
          <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=  base_url().'c_user/index' ?>" >Detail</a>
            </li>
           
            </ul>
            
           <br>
           <div class="row mb-3">
                <div class="col">
                <a class="btn btn-outline-primary"  href="<?php echo base_url().'c_user/index'?>" >Kembali</a>
                </div>
            </div>
          <div class="row" align="middle">

            <!-- Content Column -->
            <div class="col-md-3 mb-4" >

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Foto Profile </h6>
                </div>
                <div class="card-body">
                <?php foreach($get_user as $r){?>
                <form action="<?php echo base_url().'c_user/edit_photo_nasabah/'.$r->registrasi_id ?>" method="post" enctype="multipart/form-data">
                  <?php if($r->photo_path == NULL){?>
                    <img  src="<?php echo base_url().'assets/foto/null-profile.jpg'?>" alt="" style="width:200px" class="border border-primary rounded-lg" alt="Tambahkan Foto">
                    <?php }elseif($r->photo_path != NULL){?>
                <img  src="<?php echo base_url().'assets/foto/'.$r->photo_path?>" alt="" style="width:200px" class="border border-primary rounded-lg">
                 <?php }?>
                <br>
                </div>  
                <input type="file" class="form-control" name="photo_path" id="photo_path" required>  
                <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
                </form>  
                <?php }?>
                   
              
            </div>
            

          </div>
          <div class="col" style="width:50%;">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Informasi Detail </h6>
                </div>
                <div class="card-body">
                <?php foreach($get_user as $r){?>
                  <!-- <a class="btn btn-warning mb-2" data-toggle="modal" data-target="#editModal<?= $r->registrasi_id?>"><i class="fa fa-edit"></i>&nbsp;Edit</a> -->

                <div class="d-flex align-items-start">
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Nama</th>
                    <td>
                    <form action="<?php echo base_url().'c_user/edit_nasabah_nama/'.$r->registrasi_id ?>" method="post" enctype="multipart/form-data">
                      <div class="row">
                      <div class="col-md-4">
                      <input type="text" name="nasabah_nama" class="form-control" value="<?php echo $r->nasabah_nama?>">
                      </div>
                      <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
                      </div>
                      </form>
                    </td>
                        
                    </tr>
                    <tr>
                    <th>Alamat</th>
                    <td>
                    <form action="<?php echo base_url().'c_user/edit_alamat_nasabah/'.$r->registrasi_id ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-9">
                    <input type="text" name="alamat_nasabah" class="form-control" value="<?php echo $r->alamat_jl?>">
                    </div>  
                    <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
                    </div>
                    </form>
                    </td>
                    </tr>
                    <tr>
                    <th>KRL</th>
                    <td>
                    <form action="<?php echo base_url().'c_user/edit_krl_nasabah/'.$r->registrasi_id ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-9">
                      <select name="krl_id" id="krl_id" class="form-control">
                        <?php foreach($krl_master as $k){?>
                        <option value="<?php echo $r->krl_id?>" required><?php echo $k->krl_nama?></option>
                        <?php }?>
                      </select>
                      </div>
                    <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
                    </div>
                    </form>
                    </td>
                    </tr>
                    <th>Email</th>
                    <td>
                    <form action="<?php echo base_url().'c_user/edit_email_nasabah/'.$r->registrasi_id ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-9">
                    <input type="text" name="email" class="form-control" value="<?php echo $r->email?>" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
                    </div>
                    </form>
                    </td>
                    </tr>
                    <th>File Pendukung</th>
                    <td>
                    <form action="<?php echo base_url().'c_user/edit_file_nasabah/'.$r->registrasi_id ?>" method="post" enctype="multipart/form-data">
                   
                     <img src="<?php echo base_url().'assets/foto/'.$r->attachement_file?>" alt="File Pendukung" style="width:150px" align="center">
                      <div class="row mt-2">
                      <div class="col-md-5">
                      <input type="file" class="form-control" name="attachement_file"  id="attachement_file" required>  
                      </div>
                      <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
                      </div>
                      
                      </form>
                    </td>
                    </tr>
                </thead>
                </table>
                </div>
                <?php }?>
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
<script>
$(document).ready(function(){
 $('#uploadImage').submit(function(event){
  if($('#uploadFile').val()){
   event.preventDefault();
   $('#loader-icon').show();
   $('#targetLayer').hide();
   $(this).ajaxSubmit({
    target: '#targetLayer',
    beforeSubmit:function(){
     $('.progress-bar').width('50%');
    },
    uploadProgress: function(event, position, total, percentageComplete){
     $('.progress-bar').animate({
      width: percentageComplete + '%'
     }, {
      duration: 1000
     });
    },
    success:function(){
     $('#loader-icon').hide();
     $('#targetLayer').show();
    },
    resetForm: true
   });
  }
  return false;
 });
});
</script>