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
	<input type="checkbox" name="noAplicaSG_check" id="noAplicaSG_check" onclick="noAplicaSG_check_funciont(this)" autocomplete="off" />
	<div class="btn-group">
		<label for="noAplicaSG_check" class="btn btn-primary">
			<span class="fa fa-check "></span>
			<span> </span>
		</label>
		<label for="noAplicaSG_check" class="btn btn-default active">
			No aplica
		</label>
	</div>
</div>
<br>


<div  class="row">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Astenia:</label>
			<textarea name="astenia_pacient" id="astenia_pacient" ></textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Adinamia:</label>
			<textarea name="adinamia_pacient"  id="adinamia_pacient" ></textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Anorexia:</label>
			<textarea name="anorexia_pacient" id="anorexia_pacient"></textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Fiebre:</label>
			<textarea name="fiebre_pacient"  id="fiebre_pacient"></textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Pérdida de peso:</label>
			<textarea name="pPeso_pacient"  id="pPeso_pacient"></textarea>
		</div>
    </div>

    <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Aparato hematológico:</label>
			<textarea name="otrosSI_pacient"   id="otrosSI_pacient" ></textarea>
		</div>
    </div> -->


</div>


<script>
    $("#astenia_pacient")    .attr("class","textarea_css");
    $("#adinamia_pacient")   .attr("class","textarea_css");
    $("#anorexia_pacient")   .attr("class","textarea_css");
    $("#fiebre_pacient")     .attr("class","textarea_css");
    $("#pPeso_pacient")      .attr("class","textarea_css");
    $("#otrosSI_pacient")    .attr("class","textarea_css");
    
    
    function noAplicaSG_check_funciont(res) {
        if(res.checked == true){
			$("#astenia_pacient")	.val("Sin antecedentes");
			$("#adinamia_pacient")	.val("Sin antecedentes");
			$("#anorexia_pacient")	.val("Sin antecedentes");
			$("#fiebre_pacient")	.val("Sin antecedentes");
			$("#pPeso_pacient")		.val("Sin antecedentes");
			$("#otrosSI_pacient")	.val("Sin antecedentes");
        }else{
			$("#astenia_pacient")	.val("");
			$("#adinamia_pacient")	.val("");
			$("#anorexia_pacient")	.val("");
			$("#fiebre_pacient")	.val("");
			$("#pPeso_pacient")		.val("");
			$("#otrosSI_pacient")	.val("");
        }
    }


</script>