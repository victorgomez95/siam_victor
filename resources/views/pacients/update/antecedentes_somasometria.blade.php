<br>
<div  class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			{!!Form::label('peso_1','Peso*:')!!}
			<input 	name="peso_pacient"  
					type="number" 
					class="form-control"
					placeholder='Ingrese peso en kgr ej. 62.5'
				   value ="{{$antecedentes_nsoma->peso}}">
			</input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			{!!Form::label('altura_1','Altura*:')!!}
			<input 	name="altura_pacient"  
					type="number" 
					class="form-control"
					placeholder='Ingrese altura en cm ej 172'
				    value ="{{$antecedentes_nsoma->altura}}">
			</input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			{!!Form::label('parterial_1','Presión arterial sistólica*:')!!}
			<input 	name="psistolica_pacient"  
					type="number" 
					class="form-control"
					placeholder='Ingrese presión arterial en mm/Hg ej. 120'
				    value ="{{$antecedentes_nsoma->psistolica}}">
			</input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			{!!Form::label('parterial_1','Presión arterial diastólica*:')!!}
			<input 	name="pdiastolica_pacient"  
					type="number" 
					class="form-control"
					placeholder='Ingrese presión arterial en mm/Hg ej. 80'
				    value ="{{$antecedentes_nsoma->pdiastolica}}">
			</input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			{!!Form::label('frespiratoria_1','Frecuencia respiratoria*:')!!}
			<input 	name="frespiratoria_pacient"  
					type="number" 
					class="form-control"
					placeholder='Ingrese respiraciones por minuto ej. 17'
				    value ="{{$antecedentes_nsoma->frespiratoria}}">
			</input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			{!!Form::label('pulso_1','Pulso*:')!!}
			<input 	name="pulso_pacient"  
					type="number" 
					class="form-control"
					placeholder='Ingrese pulso en latidos por minuto ej. 64'
				    value ="{{$antecedentes_nsoma->pulso}}">
			</input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			{!!Form::label('oximetria_1','Oximetría*:')!!}
			<input 	name="oximetria_pacient"  
					type="number" 
					class="form-control"
					placeholder='Ingrese porcentaje de oxígeno en la sangre en % ej. 95'
				    value ="{{$antecedentes_nsoma->oximetria}}">
			</input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div  class="form-group ">
			{!!Form::label('glucometria_1','Glucometría*:')!!}
			<input 	name="glucometria_pacient"  
					type="number" 
					class="form-control"
					placeholder='Ingrese glucometría en mg/dL ej. 90'
				    value ="{{$antecedentes_nsoma->glucometria}}">
			</input>
		</div>
	</div>
</div>

