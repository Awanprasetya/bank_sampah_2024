
<?php foreach($r_sampah as $i): ?>
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
      <form class="form-horizontal form-bordered" name="autoSumForm" autocomplete="off" action="<?php echo base_url().'c_jenis_sampah_reff/edit/'.$i->id ?>" method="post">
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
        <input type="text" name="deskripsi" id="deskripsi" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true" value="<?php echo $i->deskripsi?>">  
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