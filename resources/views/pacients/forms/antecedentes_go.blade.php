<style>
.notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
       -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
            box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
}
.notice-sm {
    padding: 10px;
    font-size: 80%;
}
.notice-lg {
    padding: 35px;
    font-size: large;
}
.notice-success {
    border-color: #80D651;
}
.notice-success>strong {
    color: #80D651;
}
.notice-info {
    border-color: #45ABCD;
}
.notice-info>strong {
    color: #45ABCD;
}
.notice-warning {
    border-color: #FEAF20;
}
.notice-warning>strong {
    color: #FEAF20;
}
.notice-danger {
    border-color: #d73814;
}
.notice-danger>strong {
    color: #d73814;
}

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

<div  class="row" id="antecedentes_go" style='display:none;'>
	<div class="container">
		<div class="form-group">
			<input type="checkbox" name="noAplicaGO_check" id="noAplicaGO_check" onclick="noAplicaGO_check_funciont(this)" autocomplete="off" />
			<div class="btn-group">
				<label for="noAplicaGO_check" class="btn btn-primary">
					<span class="fa fa-check "></span>
					<span> </span>
				</label>
				<label for="noAplicaGO_check" class="btn btn-default active">
					No aplica
				</label>
			</div>
		</div>
		<br>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">1.-Menarca</label>
			<input class="form-control" placeholder="ingrese antecedente" name="menarca" id="menarca"></input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">2.-Ritmo menstrual</label>
			<input class="form-control" placeholder="ingrese antecedente" name="rmenstrual" id="rmenstrual">
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">3.-Dismenorrea / Fecha de última menstruación</label>
			<input class="form-control" placeholder="ingrese antecedente" name="dismenorrea" id="dismenorrea"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">4.-Inicio de vida sexual activa</label>
			<input class="form-control" placeholder="ingrese antecedente" name="ivsa" id="ivsa"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">5.-Número de parejas</label>
			<input class="form-control" placeholder="ingrese antecedente" name="parejas" type="number" id="parejas"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">6.-Número de gestas</label>
			<input class="form-control" placeholder="ingrese antecedente" name="gestas" type="number" id="gestas"></input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">7.-Número de abortos</label>
			<input class="form-control" placeholder="ingrese antecedente" name="abortos" type="number" id="abortos"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">8.-Número de partos</label>
			<input class="form-control" placeholder="ingrese antecedente" name="partos" type="number" id="partos"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">9.-Número de cesáreas</label>
			<input class="form-control" placeholder="ingrese antecedente" name="cesareas" type="number" id="cesareas"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">10.-Fecha probable de parto</label>
			<input class="form-control" name="fpp" type="date"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">11.-Menopausia</label>
			<input class="form-control" placeholder="ingrese antecedente" name="menopausia" id="menopausia"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">12.-Climaterio</label>
			<input class="form-control" placeholder="ingrese antecedente" name="climaterio" id="climaterio"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">13.-Método de planeación familiar</label>
			<input class="form-control" name="mpp" type="text" id="mpp"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">14.-Citología vaginal</label>
			<input class="form-control" placeholder="ingrese antecedente" name="citologia" id="citologia"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">15.-Exploración mamaria, mastografía</label>
			<input class="form-control" placeholder="ingrese antecedente" name="mastografia" id="mastografia"></input>
		</div>
	</div>
</div>

<div  class="row" id="antecedentes_go_noaply" style='display:block;'>

	<div class="content">
		<div class="notice notice-lg">
			<strong>No aplica </strong>  <i class="fa fa-exclamation-triangle" style="color:#FFD42A"></i> <br>
			<small>Solo aplica para pacientes de sexo "mujer"</small>
		</div>
	</div>

</div>




<script>    
    function noAplicaGO_check_funciont(res) {
        if(res.checked == true){
			$("#menarca")		.attr("value","Sin antecedentes");
			$("#rmenstrual")	.attr("value","Sin antecedentes");
			$("#dismenorrea")	.attr("value","Sin antecedentes");
			$("#ivsa")			.attr("value","Sin antecedentes");
			$("#parejas")		.attr("value",0);
			$("#gestas")		.attr("value",0);
			$("#abortos")		.attr("value",0);
			$("#partos")		.attr("value",0);
			$("#cesareas")		.attr("value",0);
			$("#menopausia")	.attr("value","Sin antecedentes");
			$("#climaterio")	.attr("value","Sin antecedentes");
			$("#mpp")			.attr("value","Sin antecedentes");
			$("#citologia")		.attr("value","Sin antecedentes");
			$("#mastografia")	.attr("value","Sin antecedentes");
        }else{
			$("#menarca")		.attr("value","");
			$("#rmenstrual")	.attr("value","");
			$("#dismenorrea")	.attr("value","");
			$("#ivsa")			.attr("value","");
			$("#parejas")		.attr("value","");
			$("#gestas")		.attr("value","");
			$("#abortos")		.attr("value","");
			$("#partos")		.attr("value","");
			$("#cesareas")		.attr("value","");
			$("#menopausia")	.attr("value","");
			$("#climaterio")	.attr("value","");
			$("#mpp")			.attr("value","");
			$("#citologia")		.attr("value","");
			$("#mastografia")	.attr("value","");
		}
    }
</script>