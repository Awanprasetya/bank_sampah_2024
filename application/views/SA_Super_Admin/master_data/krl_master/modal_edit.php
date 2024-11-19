
<?php foreach($krl_master as $km): ?>
<div class="modal" id="editModal<?= $km->krl_id?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-edit"></i>&nbsp;Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <?php echo form_open_multipart('c_jenis_sampah_reff/insert')?> -->
      <form class="form-horizontal form-bordered" name="autoSumForm" autocomplete="off" action="<?php echo base_url().'c_krl_master/edit/'.$km->krl_id ?>" method="post">
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
          <span class="input-group-text" id="inputGroup-sizing-default">KRL Nama</span>
        </div>
        <input type="text" name="krl_nama" id="krl_nama" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?php echo $km->krl_nama?>" required>  
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">RW</span>
        </div>
        <select name="rw_id" id="rw_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
          <option value="<?php echo $km->rw_id?>"><?php echo $km->rw_nama?></option>
          <?php foreach($rw as $r){?>
          <option value="<?php echo $r->rw_id?>"><?php echo $r->rw_nama?></option>
          <?php }?>
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
