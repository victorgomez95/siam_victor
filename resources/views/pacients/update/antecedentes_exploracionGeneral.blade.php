<style>
#radioBtn .notActive{
    color: #3276b1;
    background-color: #fff;
}
</style>




<br>

<div  class="row">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
            <div align="center">
                <br>
                <div  class="input-group">
					
                    <div id="radioBtn" class="btn-group">
						<label for="nombre">Orientación:</label> <br>
						@if($antecedentes_eg->ori_desori == "Orientado")
                        	<a class="btn btn-primary btn-sm Active"    	data-toggle="ori_desori"    data-title="Orientado">
						@else
							<a class="btn btn-primary btn-sm notActive"    	data-toggle="ori_desori"    data-title="Orientado">
						@endif
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Orientado
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						@if($antecedentes_eg->ori_desori == "Desorientado")
                        	<a class="btn btn-primary btn-sm Active" data-toggle="ori_desori" data-title="Desorientado">
						@else
							<a class="btn btn-primary btn-sm notActive" data-toggle="ori_desori" data-title="Desorientado">
						@endif
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Desorientado
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
                    <input type="hidden" name="ori_desori" id="ori_desori">
                </div>
            </div>
    	</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			<div align="center">
                <br>
                <div  class="input-group">
					<label for="nombre">Hidratación:</label> <br>
                    <div id="radioBtn" class="btn-group">
						@if($antecedentes_eg->hidra_deshidra == "Hidratado")
                        	<a class="btn btn-primary btn-sm Active"    data-toggle="hidra_deshidra" data-title="Hidratado">
						@else
							<a class="btn btn-primary btn-sm notActive"    data-toggle="hidra_deshidra" data-title="Hidratado">
						@endif
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Hidratado
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
						@if($antecedentes_eg->hidra_deshidra == "Deshidratado")
                        	<a class="btn btn-primary btn-sm Active" data-toggle="hidra_deshidra" data-title="Deshidratado">
						@else
							<a class="btn btn-primary btn-sm notActive" data-toggle="hidra_deshidra" data-title="Deshidratado">
						@endif
                        
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Deshidratado
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </div>
                    <input type="hidden" name="hidra_deshidra" id="hidra_deshidra">
                </div>
            </div>
		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			<div align="center">
                <br>
                <div  class="input-group">
					<label for="nombre">Coloración:</label> <br>
                    <div id="radioBtn" class="btn-group">
                        
						@if($antecedentes_eg->coloracion == "Coloracion_adecuada")
                        	<a class="btn btn-primary btn-sm Active"    data-toggle="coloracion" data-title="Coloracion_adecuada">adecuada</a>
						@else
							<a class="btn btn-primary btn-sm notActive"    data-toggle="coloracion" data-title="Coloracion_adecuada">adecuada</a>
						@endif
						@if($antecedentes_eg->coloracion == "Palidez")
                        	<a class="btn btn-primary btn-sm Active" data-toggle="coloracion" data-title="Palidez">Palidez</a>
						@else
							<a class="btn btn-primary btn-sm notActive" data-toggle="coloracion" data-title="Palidez">Palidez</a>
						@endif
						@if($antecedentes_eg->coloracion == "Ictérico")
                        	<a class="btn btn-primary btn-sm Active" data-toggle="coloracion" data-title="Ictérico">Ictérico</a>
						@else
							<a class="btn btn-primary btn-sm notActive" data-toggle="coloracion" data-title="Ictérico">Ictérico</a>
						@endif
                        
						
                    </div>
                    <input type="hidden" name="coloracion" id="coloracion">
                </div>
            </div>
		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			<div align="center">
                <br>
                <div  class="input-group">
					<label for="nombre">Marcha:</label> <br>
                    <div id="radioBtn" class="btn-group">
						@if($antecedentes_eg->marcha_normal == "Normal")
                        	<a class="btn btn-primary btn-sm Active" data-toggle="marcha_normal" data-title="Normal">
						@else
							<a class="btn btn-primary btn-sm notActive" data-toggle="marcha_normal" data-title="Normal">
						@endif
                        
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Normal
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
						@if($antecedentes_eg->marcha_normal == "Alta_marcha")
                        	<a class="btn btn-primary btn-sm Active"    data-toggle="marcha_normal" data-title="Alta_marcha">
						@else
							<a class="btn btn-primary btn-sm notActive"    data-toggle="marcha_normal" data-title="Alta_marcha">
						@endif
						
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Alteración de la marcha
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </div>
                    <input type="hidden" name="marcha_normal" id="marcha_normal">
                </div>
            </div>
		</div>
	</div>

</div>

<script>
$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
</script>