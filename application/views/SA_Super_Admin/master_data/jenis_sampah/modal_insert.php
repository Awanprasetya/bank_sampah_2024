
<div class="modal" id="insertModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-plus"></i>&nbsp;Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <?php echo form_open_multipart('c_jenis_sampah/insert')?> -->
      <form class="form-horizontal form-bordered" name="autoSumForm" autocomplete="off" action="<?php echo base_url().'c_jenis_sampah/insert' ?>" method="post">
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
          <span class="input-group-text" id="inputGroup-sizing-default">Jenis Sampah</span>
        </div>
        <select class="form-control select2 " style="width: 100%;" tabindex="-1" aria-hidden="true"  name="reff_sampah_id" id="reff_sampah_id" required>
          <?php foreach($r_sampah as $r){?>
          <option value="<?= $r->id?>"><?= $r->deskripsi?></option>
          <?php }?>
        </select>      
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">KRL</span>
        </div>
        <select class="form-control select2" style="width: 100%;" tabindex="-1" aria-hidden="true"  name="krl_id" id="krl_id" required>
          <?php foreach($krl_master as $k){?>
          <option value="<?= $k->krl_id?>"><?= $k->krl_nama?></option>
          <?php }?>
        </select>   
      </div>
      </div>
      <div class="col-md-6 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Harga</span>
        </div>
        <input type="text" name="harga" id="harga" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" required>
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
