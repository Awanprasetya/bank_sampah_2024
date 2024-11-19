
<?php foreach($get_nasabah_tarik as $r): 
  $kode_transaksi = $r->transaksi_id;
  $nasabah_id = $r->nasabah_id;
  $saldo = $r->nominal_keluar; 
  $sisa_saldo = $r->nominal_saldo; 
  ?>
<div class="modal" id="editstatusModal<?= $kode_transaksi?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-edit"></i>&nbsp;Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <?php echo form_open_multipart('c_jenis_sampah_reff/insert')?> -->
      <form class="form-horizontal form-bordered" name="autoSumForm" autocomplete="off" action="<?php echo base_url().'c_tarik_saldo/edit_status/'.$kode_transaksi.'/'.$nasabah_id ?>" method="post">
      <form name="autoSumForm">


       <div class="modal-body">
       <input type="num" name="nominal_saldo" id="nominal_saldo" class="form-control " value="<?php echo $saldo;?>" hidden>  
       <input type="num" name="sisa_saldo" id="sisa_saldo" class="form-control " value="<?php echo $sisa_saldo;?>" hidden>  


        <div class="col-md-9 ml-3">
      <div class="input-group input-group-default mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
        </div>
        <select name="status" id="status" class="form-control " style="width: 100%;" tabindex="-1" aria-hidden="true">
      <option value="<?= $r->status ?>"><?= $r->status ?></option>  
      <option value="D_Draft">D_Draft</option>  
      <option value="A_Aktif">A_Aktif</option>  
        
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
