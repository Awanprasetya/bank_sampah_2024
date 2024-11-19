
<?php foreach($index_jenis as $i): ?>
<div class="modal" id="editModal<?= $i->id?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-edit"></i>&nbsp;Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <?php echo form_open_multipart('c_jenis_sampah_reff/insert')?> -->
      <form class="form-horizontal form-bordered" name="autoSumForm" autocomplete="off" action="<?php echo base_url().'c_jenis_sampah/edit/'.$i->id ?>" method="post">
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
        <input type="text" name="id" id="id" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?php echo $i->id?>" hidden>  

        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Jenis Sampah</span>
        </div>
      <select name="reff_sampah_id">
        <option value="<?php echo $i->reff_sampah_id?>"><?php echo $i->jenis_sampah?></option> 
        <?php foreach($get_jenis_reff as $r){?> 
       <option value="<?php echo $r->reff_sampah_id?>"><?php echo $r->jenis_sampah?></option> 
       <?php } ?>
      </select>
      </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">KRL</span>
        </div>
      <select name="krl_id">
      <option value="<?php echo $i->krl_id?>"><?php echo $i->krl_nama?></option> 
        <?php foreach($get_jenis_krl as $r){?> 
       <option value="<?php echo $r->krl_id?>"><?php echo $r->krl_nama?></option> 
       <?php } ?>
      </select>
      </div>
        </div>
        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Harga</span>
        </div>
     <input type="text" value="<?php echo $i->harga?>" name="harga">
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
