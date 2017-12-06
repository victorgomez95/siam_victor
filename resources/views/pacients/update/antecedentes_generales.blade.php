<br>
<div class="form-group row" >
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Nombre <font style="color:red">*</font></label> {{$pacient->nombre}}
	  <input type="text" class="form-control" placeholder='Ingrese nombre de nuevo paciente' title='Este campo es de tipo texto' name="nombre" id='nombre' value='{{$pacient->nombre}}'>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Apellido paterno <font style="color:red">*</font></label>
	  <input type="text" class="form-control" placeholder='Ingrese apellido paterno de paciente' title='Este campo es de tipo texto' name="apaterno" id='apaterno' value='{{$pacient->apaterno}}'>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	<label>Apellido materno <font style="color:red">*</font></label>
	<input type="text" class="form-control" placeholder='Ingrese apellido materno de paciente' title='Este campo es de tipo texto' name="amaterno" id='amaterno' value='{{$pacient->amaterno}}'>
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
	  <input type="date" class="form-control" name="fecha_nac" id='fecha_nac' value='{{$pacient->fecha_nac}}'>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>CURP <font style="color:red">*</font></label>
	  <input type="text" class="form-control" placeholder='Ingrese CURP de paciente' name="curp" id='curp' value='{{$pacient->curp}}' maxlength="18">
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
	  <label>Nacionalidad <font style="color:red">*</font></label>
	  <select name="nacionalidad" placeholder="Seleccione nacionalidad"  class="form-control selectpicker" data-live-search="true" id='nacionalidad'>
		  <option value="<?php echo $pacient->nacionalidad ?>"><?php echo $nac; ?></option>
		  <?php foreach ($nationalities as $nationality) { ?>
			<option value="<?php echo $nationality->CVE_NAC ?>"><?php echo $nationality->pais;?></option>
		  <?php } ?>
	  </select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Estado de residencia <font style="color:red">*</font></label>
  	  <select name="estado" id="state" placeholder="Seleccione estado"  class="form-control selectpicker" data-live-search="true" id='nacionalidad'>
        <option value="<?php echo $pacient->estado ?>"><?php echo $ent; ?></option>
        <?php foreach ($states as $state) { ?>
            <option value="<?php echo $state->CVE_ENT ?>"><?php echo $state->NOM_ENT;?></option>
        <?php } ?>
    </select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Municipio <font style="color:red">*</font></label>
	  <select name="municipio"  id="town" class="form-control selectpicker reload-states" data-live-search="true" placeholder="Seleccione un municipio">
		<option value="N/A">N/A</option>
	  </select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Localidad <font style="color:red">*</font></label>
	  <select name="localidad"  id="locality" class="form-control selectpicker reload-town"  data-live-search="true"  placeholder="Seleccione un localidad">
		<option value="N/A">N/A</option>
	  </select>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Código postal (opcional)</label>
	  <input type="number" class="form-control" placeholder='Ingrese código postal' title='Este campo es de tipo numérico' name="cp" id='cp' value='{{$pacient->cp}}'>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Colonia <font style="color:red">*</font></label>
	  <input type="text" class="form-control" placeholder='Ingrese colonia' title='Este campo es de tipo texto' name="colonia" id='colonia' value='{{$pacient->colonia}}'>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Calle <font style="color:red">*</font></label>
	  <input type="text" class="form-control" placeholder='Ingrese la calle del domicilio del paciente' title='Este campo es de tipo texto' name="calle" id='calle' value='{{$pacient->calle}}'>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Número exterior <font style="color:red">*</font></label>
	  <input type="number" class="form-control" placeholder='Número exterior' title='Este campo es de tipo texto' name="num_ext" id='num_ext' value='{{$pacient->num_ext}}'>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Número interior (opcional)</label>
	  <input type="number" class="form-control" placeholder='Número interior' title='Este campo es de tipo numérico' name="num_int" id='num_int' value='{{$pacient->num_int}}'>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Télefono de casa (opcional)</label>
	  <input type="number" class="form-control" placeholder='Ingrese ateléfono de casa' title='Este campo es de tipo numérico' name="telefono_casa" id='telefono_casa' value='{{$pacient->telefono_casa}}'>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Teléfono celular (opcional)</label>
	  <input type="tel" class="form-control" placeholder='Ingrese teléfono celular' title='Este campo es de tipo numérico' name="telefono_celular" id='telefono_celular' value='{{$pacient->apaterno}}'>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Teléfono de oficina (opcional)</label>
	  <input type="tel" class="form-control" placeholder='Ingrese teléfono de oficina' title='Este campo es de tipo numérico' name="telefono_oficina" id='telefono_oficina' value='{{$pacient->telefono_oficina}}'>
  </div>
  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
	  <label>Correo (opcional)</label>
	  <input type="email" class="form-control" placeholder='Ingrese correo del paciente' title='Este campo es de tipo texto' name="correo" id='correo' value='{{$pacient->correo}}'>
  </div>
</div>