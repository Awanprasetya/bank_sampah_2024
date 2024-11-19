
<?php foreach($get_user as $r): ?>
<div class="modal" id="editstatusModal<?= $r->registrasi_id?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-edit"></i>&nbsp;Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <?php echo form_open_multipart('c_jenis_sampah_reff/insert')?> -->
      <form class="form-horizontal form-bordered" name="autoSumForm" autocomplete="off" action="<?php echo base_url().'c_data_registrasi/edit_status/'.$r->registrasi_id ?>" method="post">
      <form name="autoSumForm">


       <div class="modal-body">
       <input type="text" name="user_level" id="user_level" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?php echo $r->user_level;?>" hidden>  
       <input type="text" name="email" id="email" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?php echo $r->email;?>" hidden>  
       <input type="text" name="nama" id="nama" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?php echo $r->nama;?>" hidden>  
       <input type="text" name="user_name" id="user_name" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?php echo $r->user_name;?>" hidden>  
       <input type="password" name="password" id="password" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?php echo $r->password;?>" hidden>  

        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
        </div>
        <select name="status" id="status" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
      <option value="<?= $r->status ?>"><?= $r->status ?></option>  
      <option value="Draft">Draft</option>  
      <option value="Aktif">Aktif</option>  
      <option value="Expered">Expered</option>
        
        </select>
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
