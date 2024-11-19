
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
      <form class="form-horizontal form-bordered" name="autoSumForm" autocomplete="off" action="<?php echo base_url().'c_setor/setorSampah/'.$kode_transaksi ?>" method="post">
      <form name="autoSumForm">


            <div class="modal-body">
        <div class="row mb-3">
        <div class="col-lg-12">
        <span>Jenis Sampah :</span>
        <div class="input-group">
        <span class="input-group-btn">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchModal" ><i class="fa fa-search"></i></button>
        </span>
        <input type="text" name="jenis" id="jenis" class="form-control center" placeholder="Jenis Sampah"  >
        <input type="text" name="sampah_master_id" id="sampah_master_id" class="form-control center" placeholder="Jenis Sampah"  hidden>
        </div>
        </div>
        </div>
      <!-- <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Jenis Sampah</span>
        </div>
       <select name="sampah_master_id" id="reff_sampah_id"  class="form-control" >
        <?php foreach($get_sampah_all as $s){ ?>
        <option value="<?php echo $s->reff_sampah_id;?>"><?php echo $s->deskripsi;?></option>
        <?php }?>
       </select>
      </div> -->
      
      <!-- <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Harga</span>
        </div>
       <select name="harga" id="harga"  class="form-control">
       <option value="0">-PILIH-</option>
       </select>
      </div> -->
      <div class="row">
      <div class="col-lg-7">
      <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Harga /Kg</span>
        </div>
        <input type="text"  name="harga" id="harga" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" onFocus="startCalc();" onBlur="stopCalc();" disabled>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-lg-7">
      <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Kilo Gram (KG)</span>
        </div>
        <input type="number" min="0" name="jml_kg" id="jml_kg" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" onFocus="startCalc();" onBlur="stopCalc();">
      </div>
      </div>
      </div>  
      <div class="row">
      <div class="col-lg-8">
      <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Jumlah Harga</span>
        </div>
        <input type="number" min="0" name="jml_harga" id="jml_harga" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" >
      </div>
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
<!-- <script type="text/javascript">
        $(document).ready(function(){
                $('#reff_sampah_id').change(function(){
                        var id=$(this).val();
                        $.ajax({
                                url : "<?php echo base_url().'c_setor/get_sampah_id';?>",
                                method : "POST",
                                data : {id: id},
                                async : false,
                        dataType : 'json',
                                success: function(data){
                                        var html = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option>'+data[i].harga+'</option>';
                            }
                            $('#harga').html(html);
                                         
                                }
                        });
                });
        });
</script> -->
<!-- <script>
    function autofill(){
        var reff_sampah_id =document.getElementById('reff_sampah_id').value;
        $.ajax({
                       url:"<?php echo base_url().'c_setor/get_sampah_id';?>",
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
<!-- <script type="text/javascript">
	$('#reff_sampah_id').change(function() { 
		var reff_sampah_id = $(this).val(); 
		$.ajax({
			type: 'POST', 
			url: '<?php echo base_url().'c_setor/get_sampah_id';?>', 
			data: 'reff_sampah_id=' + reff_sampah_id, 
			success: function(response) { 
				$('#harga').html(response); 
			}
		});
	});
 
</script> -->
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
