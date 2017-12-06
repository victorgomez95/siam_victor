<br>
<div class="form-group row" >
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Nombre <font style="color:red">*</font></label>
      {!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingrese nombre de nuevo paciente','title'=>'Este campo es de tipo texto','id'=>'nombre'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Apellido paterno <font style="color:red">*</font></label>
	  {!!Form::text('apaterno',null,['class'=>'form-control', 'placeholder'=>'Ingrese apellido paterno de paciente','title'=>'Este campo es de tipo texto','id'=>'apaterno'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	<label>Apellido materno <font style="color:red">*</font></label>
  	{!!Form::text('amaterno',null,['class'=>'form-control', 'placeholder'=>'Ingrese apellido materno de paciente','title'=>'Este campo es de tipo texto','id'=>'amaterno'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Sexo <font style="color:red">*</font></label>
    <select name="sexo" onchange="selectSexo(this);"  data-live-search="true" class="selectpicker form-control" id='sexo'>
      <option value="H">Masculino</option>
      <option value="F">Femenino</option>
    </select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Fecha de nacimiento <font style="color:red">*</font></label>
  	  {!!Form::date('fecha_nac',null,['class'=>'form-control', 'placeholder'=>'Ingrese fecha de nacimiento de paciente','id'=>'fecha_nac'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>CURP </label>
	  <input type="text" name="curp" class="form-control" placeholder="Ingrese CURP de paciente" maxlength="18" id='curp' pattern="/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9][12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/
" title="Este campo es de tipo texto"/>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Estado civil <font style="color:red">*</font></label>
	  <select name="estadocivil"  class="form-control selectpicker" data-live-search="true" id='estadocivil'>
		<option value="Soltero(a)"   >Soltero(a)    </option>
		<option value="Casado(a)"    >Casado(a)     </option>
		<option value="Divorciado(a)">Divorciado(a) </option>
		<option value="Viudo(a)"     >Viudo(a)      </option>
		<option value="Unión libre"  >Unión libre   </option>
	  </select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Nacionalidad </label>
	  <select name="nacionalidad" placeholder="Seleccione nacionalidad"  class="form-control selectpicker" data-live-search="true" id='nacionalidad'>
		  <?php foreach ($nationalities as $nationality) { ?>
			<option value="<?php echo $nationality->CVE_NAC ?>"><?php echo $nationality->pais;?></option>
		  <?php } ?>
	  </select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Estado de residencia </label>
  	  {!!Form::select('estado',$states,null,['id'=>'state','placeholder'=>'Seleccione un estado','class'=>'form-control selectpicker', 'data-live-search'=>'true'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Municipio </label>
	  <select name="municipio"  id="town" class="form-control selectpicker reload-states" data-live-search="true" placeholder="Seleccione un municipio">
		<option value="N/A">N/A</option>
	  </select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Localidad </label>
	  <select name="localidad"  id="locality" class="form-control selectpicker reload-town"  data-live-search="true"  placeholder="Seleccione un localidad">
		<option value="N/A">N/A</option>
	  </select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Código postal (opcional)</label>
  	  {!!Form::number('cp',null,['class'=>'form-control', 'placeholder'=>'Ingrese código postal','title'=>'Este campo es numérico','id'=>'cp'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Colonia <font style="color:red">*</font></label>
  	  {!!Form::text('colonia',null,['class'=>'form-control', 'placeholder'=>'Ingrese colonia','title'=>'Este campo es de tipo texto','id'=>'colonia'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Calle <font style="color:red">*</font></label>
  	  {!!Form::text('calle',null,['class'=>'form-control', 'placeholder'=>'Ingrese la calle del domicilio del paciente','title'=>'Este campo es de tipo texto','id'=>'calle'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Número exterior <font style="color:red">*</font></label>
  	  {!!Form::number('num_ext',null,['class'=>'form-control', 'placeholder'=>'Número exterior','title'=>'Este campo es numérico','id'=>'num_ext'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Número interior (opcional)</label>
	  {!!Form::number('num_int',null,['class'=>'form-control', 'placeholder'=>'Número interior','title'=>'Este campo es numérico','id'=>'num_int'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Télefono de casa (opcional)</label>
  	  {!!Form::number('telefono_casa',null,['class'=>'form-control', 'placeholder'=>'Ingrese teléfono de casa','title'=>'Este campo es numérico','id'=>'telefono_casa'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Teléfono celular (opcional)</label>
  	  {!!Form::number('telefono_celular',null,['class'=>'form-control', 'placeholder'=>'Ingrese teléfono celular','title'=>'Este campo es de numérico','id'=>'telefono_celular'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Teléfono de oficina (opcional)</label>
  	  {!!Form::number('telefono_oficina',null,['class'=>'form-control', 'placeholder'=>'Ingrese teléfono de oficina','title'=>'Este campo es numérico','id'=>'telefono_oficina'])!!}
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Correo (opcional)</label>
  	  {!!Form::email('correo',null,['class'=>'form-control', 'placeholder'=>'Ingrese correo del paciente','title'=>'Este campo es de tipo texto - Email','id'=>'correo'])!!}
  </div>
</div>




