
<div class="modal" id="searchModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">List Jenis Sampah</h5>
      </div>
      <div class="modal-body">
      <table class="table table-bordered table-striped mb-none" id="datatable-default">
        <thead>
        <tr>
          <th>No.</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
        </thead>
      
        <tbody>
        <?php 
        $no=1;
        foreach($get_sampah_all as $s){?>
            <tr>
              <td><?= $no++;?></td>
                <td><?= $s->deskripsi;?></td>
                <td><?= "Rp.".number_format($s->harga);?></td>
                <td align="center">
                  <button type="button" class="btn btn-info btn-sm" id="select" data-deskripsi="<?= $s->deskripsi?>" data-harga="<?= $s->harga?>" data-reff_sampah_id = "<?= $s->reff_sampah_id ?>"><i class="fa fa-check"></i>&nbsp;Select</button>
                </td>
            </tr>
            <?php }?>
        </tbody>
        
    </table>

      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $(document).on('click', '#select', function(){
          var deskripsi =  $(this).data('deskripsi'); 
          var harga =  $(this).data('harga'); 
          var reff_sampah_id =  $(this).data('reff_sampah_id'); 
          $('#jenis').val(deskripsi) ;
          $('#harga').val(harga) ;
          $('#sampah_master_id').val(reff_sampah_id) ;
        $('#searchModal').modal('hide');
    })
})
</script>
