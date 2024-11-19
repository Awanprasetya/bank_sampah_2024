
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="modal" id="insertModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Formulir Setor Sampah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <?php echo form_open_multipart('c_transaksi/setorSampah')?> -->
      <form class="form-horizontal form-bordered" name="autoSumForm" autocomplete="off" action="<?php echo base_url().'c_transaksi/setorSampah' ?>" method="post">
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
      <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Jenis Sampah</span>
        </div>
       <Select name="sampah_master_id" id="reff_sampah_id" class="js-example-basic-single" onchange="return autofill();" >
        <?php foreach($m_sampah as $s){ ?>
        <option value="<?php echo $s->reff_sampah_id;?>"><?php echo $s->reff_sampah_id;?></option>
        <?php }?>
       </Select>
      </div>
      
      <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Harga /Kg</span>
        </div>
        <input type="number" min="0" name="harga" id="harga" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" onFocus="startCalc();" onBlur="stopCalc();" >
      </div>
      <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Kilo Gram (KG)</span>
        </div>
        <input type="number" min="0" name="jml_kg" id="jml_kg" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" onFocus="startCalc();" onBlur="stopCalc();">
      </div>
      <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Jumlah Harga</span>
        </div>
        <input type="number" min="0" name="jml_harga" id="jml_harga" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-primary">Setor</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- <script>
    function autofill(){
        var reff_sampah_id =document.getElementById('reff_sampah_id').value;
        $.ajax({
                       url:"<?php echo base_url().'c_transaksi/get_sampah_id';?>",
                       data:'&reff_sampah_id='+reff_sampah_id,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                     
            $.each(hasil, function(key,val){ 
                 
               document.getElementById('harga').value=val.harga;
                                
                     
                });
            }
                   });
                   
    };
</script> -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#reff_sampah_id').on('change', function(){
			var reff_sampah_id = $('#reff_sampah_id').val();
			$.ajax({
			    type: 'POST',
			    url: '<?php echo base_url().'c_transaksi/tampil_chained';?>',
			    data: { 'reff_sampah_id' : reff_sampah_id },
				success: function(data){
				    $("#harga").html(data);
				}
			})
		})
	})
</script>
<script>
    $('.select2').select2();
</script>
<script>

function startCalc(){

interval = setInterval("calc()",1);}

function calc(){

one = document.autoSumForm.harga.value;

two = document.autoSumForm.jml_kg.value;


document.autoSumForm.jml_harga.value = (one * 1) * (two * 1);}

function stopCalc(){

clearInterval(interval);}

</script>