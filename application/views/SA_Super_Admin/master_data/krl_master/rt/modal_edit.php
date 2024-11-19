
<?php foreach($get_rt_rw as $r): ?>
<div class="modal" id="editModal<?= $r->rt_id?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-edit"></i>&nbsp;Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <?php echo form_open_multipart('c_jenis_sampah_reff/insert')?> -->
      <form class="form-horizontal form-bordered" name="autoSumForm" autocomplete="off" action="<?php echo base_url().'c_rt/edit/'.$r->rt_id ?>" method="post">
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
          <span class="input-group-text" id="inputGroup-sizing-default">RT </span>
        </div>
        <input type="number" name="rt_nama" id="rt_nama" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?= $r->rt_nama?>" required>  
        </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">RW</span>
        </div>
        <select name="rw_id" id="rw_id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
      <option value="<?= $r->rw_id ?>"><?= $r->rw_nama ?></option>  
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
