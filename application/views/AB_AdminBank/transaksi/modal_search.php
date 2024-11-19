
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
            <th>reff_sampah_id</th>
            <th>harga</th>
            <th>Action</th>
        </tr>
        </thead>
      
        <tbody>
        <?php foreach($m_sampah as $s){?>
            <tr>
                <td><?= $s->reff_sampah_id;?></td>
                <td><?= $s->harga;?></td>
                <td>
                  <button type="button" class="btn btn-info" id="select" data-id="<?= $s->reff_sampah_id?>" ><i class="fa fa-check"></i>Select</button>
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
        var id =  $(this).data('id'); 
        $('#reff_sampah_id').val(id) ;
        $('#searchModal').modal('hide');
    })
})
</script>
