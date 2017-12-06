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
	<input type="checkbox" name="noAplica_check" id="noAplica_check" onclick="noAplica_check_funciont(this)" autocomplete="off" />
	<div class="btn-group">
		<label for="noAplica_check" class="btn btn-primary">
			<span class="fa fa-check "></span>
			<span> </span>
		</label>
		<label for="noAplica_check" class="btn btn-default active">
			No aplica
		</label>
	</div>
</div>
<br>


<div  class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">1.-Diabetes</label>
			<input class="form-control" placeholder="ingrese antecedente" name="diabetes" id="diabetes"></input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">2.-Hipertensión</label>
			<input class="form-control" placeholder="ingrese antecedente" name="hipertension" id="hipertension">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">3.-Cardiopatía</label>
			<input class="form-control" placeholder="ingrese antecedente" name="cardiopatia" id="cardiopatia"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">4.-Hepatopatías</label>
			<input class="form-control" placeholder="ingrese antecedente" name="hepatopatia" id="hepatopatia"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">5.-Nefropatías</label>
			<input class="form-control" placeholder="ingrese antecedente" name="nefropatia" id="nefropatia"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">6.-Enfermedades mentales</label>
			<input class="form-control" placeholder="ingrese antecedente" name="enmentales" id="enmentales"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">7.-Asma</label>
			<input class="form-control" placeholder="ingrese antecedente" name="asma" id="asma"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">8.-Cancer</label>
			<input class="form-control" placeholder="ingrese antecedente" name="cancer" id="cancer"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">9.-Enfermedades alérgicas</label>
			<input class="form-control" placeholder="ingrese antecedente" name="enalergicas" id="enalergicas"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">10.-Enfermedades endócrinas</label>
			<input class="form-control" placeholder="ingrese antecedente" name="endocrinas" id="endocrinas"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">11.-Otros</label>
			<input class="form-control" placeholder="ingrese antecedente" name="otros" id="otros"></input>
		</div>
	</div>
</div>




<script>

    
    function noAplica_check_funciont(res) {
        if(res.checked == true){
			$("#diabetes")		.attr("value","Sin antecedentes");
			$("#hipertension")	.attr("value","Sin antecedentes");
			$("#cardiopatia")	.attr("value","Sin antecedentes");
			$("#hepatopatia")	.attr("value","Sin antecedentes");
			$("#nefropatia")	.attr("value","Sin antecedentes");
			$("#enmentales")	.attr("value","Sin antecedentes");
			$("#asma")			.attr("value","Sin antecedentes");
			$("#cancer")		.attr("value","Sin antecedentes");
			$("#enalergicas")	.attr("value","Sin antecedentes");
			$("#endocrinas")	.attr("value","Sin antecedentes");
			$("#otros")			.attr("value","Sin antecedentes");
        }else{
			$("#diabetes")		.attr("value","");
			$("#hipertension")	.attr("value","");
			$("#cardiopatia")	.attr("value","");
			$("#hepatopatia")	.attr("value","");
			$("#nefropatia")	.attr("value","");
			$("#enmentales")	.attr("value","");
			$("#asma")			.attr("value","");
			$("#cancer")		.attr("value","");
			$("#enalergicas")	.attr("value","");
			$("#endocrinas")	.attr("value","");
			$("#otros")			.attr("value","");
		}
    }

</script>