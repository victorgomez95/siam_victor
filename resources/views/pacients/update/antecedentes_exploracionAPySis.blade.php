<style>
.textarea_css {
  width: 100%;
  height: 100px;
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.07);
  border-color: -moz-use-text-color #FFFFFF #FFFFFF -moz-use-text-color;
  border-image: none;
  border-radius: 6px 6px 6px 6px;
  border-style: none solid solid none;
  border-width: medium 1px 1px medium;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
  color: #555555;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 1em;
  line-height: 1.4em;
  padding: 5px 8px;
  transition: background-color 0.2s ease 0s;
  margin-top:10px;
  
}

.textarea_css1 {
    outline-width: 0;
    width: 100%;
  height: 100px;
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: none repeat scroll 0 0 #FFFFFF;
  border-color: -moz-use-text-color #FFFFFF #FFFFFF -moz-use-text-color;
  border-image: none;
  border-radius: 6px 6px 6px 6px;
  border-style: none solid solid none;
  border-width: medium 1px 1px medium;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
  color: #555555;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 1em;
  line-height: 1.4em;
  padding: 5px 8px;
  transition: background-color 0.2s ease 0s;
  margin-top:10px;
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

<div class="form-group">
	<input type="checkbox" name="noAplicaAPySi_check" id="noAplicaAPySi_check" onclick="noAplicaAPySi_check_funciont(this)" autocomplete="off" />
	<div class="btn-group">
		<label for="noAplicaAPySi_check" class="btn btn-primary">
			<span class="fa fa-check "></span>
			<span> </span>
		</label>
		<label for="noAplicaAPySi_check" class="btn btn-default active">
			No aplica
		</label>
	</div>
</div>
<br>


<div  class="row">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Aparato digestivo:</label>
				<textarea name="ap_digestivo" id="ap_digestivo" value="{{$antecedentes_apysis->ap_digestivo}}">{{$antecedentes_apysis->ap_digestivo}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Aparato cardivascular:</label>
			<textarea name="ap_cardivascular"  id="ap_cardivascular" value="{{$antecedentes_apysis->ap_cardivascular}}">{{$antecedentes_apysis->ap_cardivascular}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
			<label for="nombre">Aparato respiratorio:</label>
			<textarea name="ap_respiratorio" id="ap_respiratorio" value="{{$antecedentes_apysis->ap_respiratorio}}">{{$antecedentes_apysis->ap_respiratorio}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Aparato urinario:</label>
			<textarea name="ap_urinario"  id="ap_urinario" value="{{$antecedentes_apysis->ap_urinario}}">{{$antecedentes_apysis->ap_urinario}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Aparato genital:</label>
			<textarea name="ap_genital"  id="ap_genital" value="{{$antecedentes_apysis->ap_genital}}">{{$antecedentes_apysis->ap_genital}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Aparato hematológico:</label>
			<textarea name="ap_hematologico"   id="ap_hematologico" value="{{$antecedentes_apysis->ap_hematologico}}">{{$antecedentes_apysis->ap_hematologico}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Aparato endócrino:</label>
			<textarea name="ap_endocrino"  id="ap_endocrino" value="{{$antecedentes_apysis->ap_endocrino}}">{{$antecedentes_apysis->ap_endocrino}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Aparato osteomuscular:</label>
			<textarea name="ap_osteomuscular" id="ap_osteomuscular" value="{{$antecedentes_apysis->ap_osteomuscular}}">{{$antecedentes_apysis->ap_osteomuscular}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Sistema nervioso:</label>
			<textarea name="si_nervioso"  id="si_nervioso" value="{{$antecedentes_apysis->si_nervioso}}">{{$antecedentes_apysis->si_nervioso}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Sistema sensorial:</label>
			<textarea name="si_sensorial"  id="si_sensorial" value="{{$antecedentes_apysis->si_sensorial}}">{{$antecedentes_apysis->si_sensorial}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Sistema psicosomático:</label>
			<textarea name="sicosomatico"   id="sicosomatico" value="{{$antecedentes_apysis->sicosomatico}}">{{$antecedentes_apysis->sicosomatico}}</textarea>
		</div>
    </div>

</div>


<script>

    $("#ap_digestivo")      .attr("class","textarea_css");	
    $("#ap_cardivascular")  .attr("class","textarea_css");	
    $("#ap_respiratorio")   .attr("class","textarea_css");
    $("#ap_urinario")       .attr("class","textarea_css");
    $("#ap_genital")        .attr("class","textarea_css");
    $("#ap_hematologico")   .attr("class","textarea_css");
    $("#ap_endocrino")      .attr("class","textarea_css");
    $("#ap_osteomuscular")  .attr("class","textarea_css");
    $("#si_nervioso")       .attr("class","textarea_css");
    $("#si_sensorial")      .attr("class","textarea_css");
    $("#sicosomatico")      .attr("class","textarea_css");
	
     function noAplicaAPySi_check_funciont(res) {
        if(res.checked == true){
			$("#ap_digestivo")		.val("Sin antecedentes");
			$("#ap_cardivascular")	.val("Sin antecedentes");
			$("#ap_respiratorio")	.val("Sin antecedentes");
			$("#ap_urinario")		.val("Sin antecedentes");
			$("#ap_genital")		.val("Sin antecedentes");
			$("#ap_hematologico")	.val("Sin antecedentes");
			$("#ap_endocrino")		.val("Sin antecedentes");
			$("#ap_osteomuscular")	.val("Sin antecedentes");
			$("#si_nervioso")		.val("Sin antecedentes");
			$("#si_sensorial")		.val("Sin antecedentes");
			$("#sicosomatico")		.val("Sin antecedentes");
        }else{
			$("#ap_digestivo")		.val("");
			$("#ap_cardivascular")	.val("");
			$("#ap_respiratorio")	.val("");
			$("#ap_urinario")		.val("");
			$("#ap_genital")		.val("");
			$("#ap_hematologico")	.val("");
			$("#ap_endocrino")		.val("");
			$("#ap_osteomuscular")	.val("");
			$("#si_nervioso")		.val("");
			$("#si_sensorial")		.val("");
			$("#sicosomatico")		.val("");
		}
    }



</script>