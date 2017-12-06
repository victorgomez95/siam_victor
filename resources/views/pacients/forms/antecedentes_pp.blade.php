<style>
.form-group input[type="checkbox"] {
    display: none;
}

.form-group input[type="checkbox"] + .btn-group > label span {
    width: 20px;
}

.form-group input[type="checkbox"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="checkbox"] + .btn-group > label span:last-child {
    display: inline-block;   
}

.form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
    display: none;   
}
</style>

<br><br>

<div class="form-group">
	<input type="checkbox" name="noAplicaPP_check" id="noAplicaPP_check" onclick="noAplicaPP_check_funciont(this)" autocomplete="off" />
	<div class="btn-group">
		<label for="noAplicaPP_check" class="btn btn-primary">
			<span class="fa fa-check "></span>
			<span> </span>
		</label>
		<label for="noAplicaPP_check" class="btn btn-default active">
			No aplica
		</label>
	</div>
</div>
<br>


<div  class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">1.-Enfermedades actuales</label>
			<input class="form-control" placeholder="ingrese antecedente" name="enactuales" id="enactuales"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">2.-Quirúrgicos</label>
			<input class="form-control" placeholder="ingrese antecedente" name="quirurjicos" id="quirurjicos"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">3.-Transfusionales</label>
			<input class="form-control" placeholder="ingrese antecedente" name="transfuncionales" id="transfuncionales"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">4.-Alergias</label>
			<input class="form-control" placeholder="ingrese antecedente" name="alergias" id="alergias"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">5.-Traumáticos</label>
			<input class="form-control" placeholder="ingrese antecedente" name="traumaticos" id="traumaticos"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">6.-Hospitalizaciones previas</label>
			<input class="form-control" placeholder="ingrese antecedente" name="hosprevias" id="hosprevias"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">7.-Adicciones</label>
			<input class="form-control" placeholder="ingrese antecedente" name="adicciones" id="adicciones"></input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">8.-Otros</label>
			<input class="form-control" placeholder="ingrese antecedente" name="otros" id="otros_pp"></input>
		</div>
	</div>
</div>


<script>

    
    function noAplicaPP_check_funciont(res) {
        if(res.checked == true){
			$("#enactuales")		.attr("value","Sin antecedentes");
			$("#quirurjicos")		.attr("value","Sin antecedentes");
			$("#transfuncionales")	.attr("value","Sin antecedentes");
			$("#alergias")			.attr("value","Sin antecedentes");
			$("#traumaticos")		.attr("value","Sin antecedentes");
			$("#hosprevias")		.attr("value","Sin antecedentes");
			$("#adicciones")		.attr("value","Sin antecedentes");
			$("#otros_pp")				.attr("value","Sin antecedentes");
        }else{
			$("#enactuales")		.attr("value","");
			$("#quirurjicos")		.attr("value","");
			$("#transfuncionales")	.attr("value","");
			$("#alergias")			.attr("value","");
			$("#traumaticos")		.attr("value","");
			$("#hosprevias")		.attr("value","");
			$("#adicciones")		.attr("value","");
			$("#otros_pp")				.attr("value","");
		}
    }

</script>