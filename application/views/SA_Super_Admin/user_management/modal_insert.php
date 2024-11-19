
<div class="modal" id="insertModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <?php echo form_open_multipart('c_jenis_sampah_reff/insert')?> -->
      <?php echo form_open_multipart('c_user/insert')?>
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
        <input type="text" name="nama" id="nama" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" required>  
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Email </span>
        </div>
        <input type="text" name="email" id="email" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" required>  
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Username </span>
        </div>
        <input type="text" name="user_name" id="user_name" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true"  required>  
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Password </span>
        </div>
        <input type="password" name="password" id="password" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true"  required>  
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">User Level </span>
        </div>
        <select name="user_level" id="user_level" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
      <option value="SA_SuperAdmin">SA_SuperAdmin</option>  
      <option value="AB_AdminBank">AB_AdminBank</option>  
      <option value="AK_AdminKec">AK_AdminKec</option>
      <option value="U_User">U_User</option> 
        
        </select>        
      </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
        </div>
        <select name="status" id="status" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
      <option value="Draft">Draft</option>  
        </select>
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">KRL  </span>
        </div>
        <select name="krl_id" id="krl_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
      <?php foreach($krl_master as $k ){?>
      <option value="<?php echo $k->krl_id?>"><?php echo $k->krl_nama?></option> 
      <?php }?>
        </select>
        
      </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">No.HP </span>
        </div>
        <input type="text" name="no_hp" id="no_hp" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true"  required>  
        </div>
        </div>
        
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Upload File Pendukung </span>
        </div>

        <input type="file" class="form-control" name="attachement_file"  id="attachement_file">  
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

