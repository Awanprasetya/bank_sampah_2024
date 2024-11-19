
<?php foreach($get_user as $r): ?>
<div class="modal" id="editModal<?= $r->registrasi_id?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-edit"></i>&nbsp;Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <?php echo form_open_multipart('c_jenis_sampah_reff/insert')?> -->
      <form class="form-horizontal form-bordered" name="autoSumForm" autocomplete="off" action="<?php echo base_url().'c_user/edit/'.$r->registrasi_id ?>" method="post">
      <form name="autoSumForm">


       <div class="modal-body">
      <!-- <div class="col-md-6">
        <span>Jenis Sampah</span>
        <div class="input-group">
        <span class="input-group-btn">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchModal" ><i class="fa fa-search"></i></button>
        </span>
        <input type="text" name="sampah_master_id" id="reff_sampah_id" class="form-control center" placeholder="jenis Sampah"  >
        </div>
        </div>   -->
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Nama </span>
        </div>
        <input type="text" name="nama" id="nama" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?= $r->nama?>" required>  
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Email </span>
        </div>
        <input type="text" name="email" id="email" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?= $r->email?>" required>  
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Username </span>
        </div>
        <input type="text" name="username" id="username" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?= $r->user_name?>" required>  
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Password </span>
        </div>
        <input type="password" name="password" id="password" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?= $r->password?>" required>  
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">User Level </span>
        </div>
        <input type="text" name="user_level" id="user_level" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?= $r->user_level?>" required>  
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
        </div>
        <select name="status" id="status" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
      <option value="<?= $r->status ?>"><?= $r->status ?></option>  
      <option value="Draft">Draft</option>  
      <option value="Aktif">Aktif</option>  
        
        </select>
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">KRL  </span>
        </div>
        <select name="krl_id" id="krl_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
      <option value="<?= $r->krl_id ?>"><?= $r->krl_nama ?></option>  
      <?php foreach($krl_master as $k ){?>
      <option value="<?php echo $k->krl_nama?>"><?php echo $k->krl_nama?></option> 
        </select>
        <?php }?>
      </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">No.HP </span>
        </div>
        <input type="text" name="no_hp" id="no_hp" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?= $r->no_hp?>" required>  
        </div>
        </div>
        
        <div class="col-md-9 ml-3">
        <?php echo ' <img src="data:image/png;base64,'.base64_encode($r->attachement_file).'" alt="Gambar Alumni 1996" style="width:100px">' ?>
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Upload Foto </span>
        </div>

        <input type="file" class="form-control" value="<?php echo base64_encode($r->attachement_file)?>">  
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>
