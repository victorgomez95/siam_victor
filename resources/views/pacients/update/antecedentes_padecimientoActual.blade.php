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
}

.textarea_css:focus {
    background: none repeat scroll 0 0 #FFFFFF;
    outline-width: 0;d
}
</style>

<br><br>

<div class="form-group">
	<input type="checkbox" name="noAplicaPA_check" id="noAplicaPA_check" onclick="noAplicaPA_check_funciont(this)" autocomplete="off" />
	<div class="btn-group">
		<label for="noAplicaPA_check" class="btn btn-primary">
			<span class="fa fa-check "></span>
			<span> </span>
		</label>
		<label for="noAplicaPA_check" class="btn btn-default active">
			No aplica
		</label>
	</div>
</div>
<br>


<div class="form-group">
	{!!Form::label('descripcion_pacient','Descripción:')!!}
	<textarea name="descripcion_pacient" id="descripcion_pacient" class="textarea_css" value="{{$antecedentes_apact->descripcion_pacient}}">{{$antecedentes_apact->descripcion_pacient}}</textarea>
</div>



<script>
   
    function noAplicaPA_check_funciont(res) {
        if(res.checked == true){
			$("#descripcion_pacient").val("Sin antecedentes");
        }else{
			$("#descripcion_pacient").val("");
        }
    }


</script>

