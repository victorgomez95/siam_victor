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
<br>
<div  class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">1.-Baño</label> <br>
			<label class="radio-inline"><input type="radio" name="banio" value="Diario">Diario 	</label>
			<label class="radio-inline"><input type="radio" name="banio" value="C/3er día">C/3er día 	</label>
			<label class="radio-inline"><input type="radio" name="banio" value="Irregular">Irregular 	</label>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">2.-Lavado de dientes</label><br>
			<label class="radio-inline"><input type="radio" name="dientes" value="1/Día">1/Día</label>
			<label class="radio-inline"><input type="radio" name="dientes" value="2/Día">2/Día</label>
			<label class="radio-inline"><input type="radio" name="dientes" value="3/Día">3/Día</label>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">3.-Habitación</label><br>
			<label class="radio-inline"><input type="radio" name="habitacion" value="Urbana ">Urbana 				</label>
			<label class="radio-inline"><input type="radio" name="habitacion" value="Rural">Rural 				</label>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">4.-Servicios</label><br>
			<input type="checkbox" name="agua_pacient_check" id="agua_pacient_check" value="agua_pacient_check"/>
			<div class="btn-group">
					<label for="agua_pacient_check" class="btn btn-primary">
							<span class="fa fa-check "></span>
							<span> </span>
					</label>
					<label for="agua_pacient_check" class="btn btn-default active">
							Agua potable
					</label>
			</div>
			<br>
			<input type="checkbox" name="energia_pacient_check" id="energia_pacient_check" value="energia_pacient_check"/>
			<div class="btn-group">
					<label for="energia_pacient_check" class="btn btn-primary">
							<span class="fa fa-check "></span>
							<span> </span>
					</label>
					<label for="energia_pacient_check" class="btn btn-default active">
							Energía eléctrica
					</label>
			</div>
			<br>
			<input type="checkbox" name="telefono_pacient_check" id="telefono_pacient_check" value="telefono_pacient_check"/>
			<div class="btn-group">
					<label for="telefono_pacient_check" class="btn btn-primary">
							<span class="fa fa-check "></span>
							<span> </span>
					</label>
					<label for="telefono_pacient_check" class="btn btn-default active">
							Teléfono fijo
					</label>
			</div>
			<br>
			<input type="checkbox" name="internet_pacient_check" id="internet_pacient_check" value="internet_pacient_check"/>
			<div class="btn-group">
					<label for="internet_pacient_check" class="btn btn-primary">
							<span class="fa fa-check "></span>
							<span> </span>
					</label>
					<label for="internet_pacient_check" class="btn btn-default active">
							Internet
					</label>
			</div>
			<br>
			<input type="checkbox" name="tv_pacient_check" id="tv_pacient_check" value="tv_pacient_check"/>
			<div class="btn-group">
					<label for="tv_pacient_check" class="btn btn-primary">
							<span class="fa fa-check "></span>
							<span> </span>
					</label>
					<label for="tv_pacient_check" class="btn btn-default active">
							Televisión por cable
					</label>
			</div>
			<br>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">5.-Tabaquismo</label>
			<input class="form-control" placeholder="ingrese antecedente" name="tabaquismo"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">6.-Alcoholismo</label>
			<input class="form-control" placeholder="ingrese antecedente" name="alcoholismo"></input>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">7.-Alimentación</label>
			<input class="form-control" placeholder="ingrese antecedente" name="alimentacion"></input>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">8.-Deportes</label>
			<input class="form-control" placeholder="ingrese antecedente" name="deportes"></input>
		</div>
	</div>
</div>
