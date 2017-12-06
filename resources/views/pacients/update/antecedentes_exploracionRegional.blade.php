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
	<input type="checkbox" name="noAplicaER_check" id="noAplicaER_check" onclick="noAplicaER_check_funciont(this)" autocomplete="off" />
	<div class="btn-group">
		<label for="noAplicaER_check" class="btn btn-primary">
			<span class="fa fa-check "></span>
			<span> </span>
		</label>
		<label for="noAplicaER_check" class="btn btn-default active">
			No aplica
		</label>
	</div>
</div>
<br>

<div  class="row">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Cabeza:</label>
			<textarea name="cabeza_sujeto" id="cabeza_sujeto" value="{{$antecedentes_aer->cabeza_sujeto}}">{{$antecedentes_aer->cabeza_sujeto}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Cuello:</label>
			<textarea name="cuello_sujeto"  id="cuello_sujeto" value="{{$antecedentes_aer->cuello_sujeto}}">{{$antecedentes_aer->cuello_sujeto}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Torax:</label>
			<textarea name="torax_sujeto" id="torax_sujeto" value="{{$antecedentes_aer->torax_sujeto}}">{{$antecedentes_aer->torax_sujeto}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Abdomen:</label>
			<textarea name="abdomen_sujeto"  id="abdomen_sujeto" value="{{$antecedentes_aer->abdomen_sujeto}}">{{$antecedentes_aer->abdomen_sujeto}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Miembros:</label>
			<textarea name="miembros_sujeto"  id="miembros_sujeto" value="{{$antecedentes_aer->miembros_sujeto}}">{{$antecedentes_aer->miembros_sujeto}}</textarea>
		</div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Genitales:</label>
			<textarea name="genitales_sujeto"   id="genitales_sujeto" value="{{$antecedentes_aer->genitales_sujeto}}" >{{$antecedentes_aer->genitales_sujeto}}</textarea>
		</div>
    </div>
</div>


<script>
    $("#cabeza_sujeto")     .attr("class","textarea_css");
    $("#cuello_sujeto")  	.attr("class","textarea_css");
    $("#torax_sujeto")   	.attr("class","textarea_css");
    $("#abdomen_sujeto")    .attr("class","textarea_css");
    $("#miembros_sujeto")   .attr("class","textarea_css");
    $("#genitales_sujeto")  .attr("class","textarea_css");
    
    
    
    function noAplicaER_check_funciont(res) {
        if(res.checked == true){
            $("#cabeza_sujeto")		.val("Sin antecedentes");
			$("#cuello_sujeto")		.val("Sin antecedentes");
			$("#torax_sujeto")		.val("Sin antecedentes");
			$("#abdomen_sujeto")	.val("Sin antecedentes");
			$("#miembros_sujeto")	.val("Sin antecedentes");
			$("#genitales_sujeto")	.val("Sin antecedentes");
        }else{
            $("#cabeza_sujeto")		.val("");
			$("#cuello_sujeto")		.val("");
			$("#torax_sujeto")		.val("");
			$("#abdomen_sujeto")	.val("");
			$("#miembros_sujeto")	.val("");
			$("#genitales_sujeto")	.val("");
        }
    }



</script>