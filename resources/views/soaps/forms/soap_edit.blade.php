<div>
<h4 align="center">Datos de la nota de evolución SOAP</h4>
</div>
<!--
<div class="form-group">
  <table>
    <thead>
      <tr><th colspan="2"><h4 align="center">Lista de diagnósticos iniciales previos</h4></th></tr>
      <tr><th>Folio de diagnóstico</th><th>Nombre</th></tr>
     </thead>
     <tbody id="tabla_previos_iniciales">
     </tbody>
  </table>
</div>-->
<div class="form-group">
  <table>
    <thead>
       <tr><th colspan="2"><h4 align="center">Lista de diagnósticos iniciales previos</h4></th></tr>
       <tr><th>Folio de diagnóstico</th><th>Nombre</th></tr>
      </thead>
      <tbody data-bind="foreach: { data: diagnosticos_previos, as: 'diagnostico' }">
          <tr data-bind=" if: diagnostico.tipo()=='Inicial' ">
              <td><input data-bind="value: diagnostico.id()" disabled ></input></td>
              <td><input data-bind="value: diagnostico.nombre()" disabled ></input></td>
          </tr>
      </tbody>
  </table>
</div>
<div id="scrollable-dropdown-menu">
  {!!Form::label('objetivo_1','Diagnóstico inicial:')!!}
  <input name="dinicial" id="dinicial" placeholder="Su diagnóstico inicial..." data-bind="value: dinicial" class="form-control" autocomplete="off">
  <button id="btnAgregar" data-bind="click: $root.anadirdiagini"
      class="btn btn-primary btn-sm">Añadir a lista de diganósticos</button>
</div>
<div class="form-group">
  <table data-bind="visible: nuevos_diagnosticos_ini().length > 0">
    <thead>
         <tr><th># De diagnóstico inicial</th><th>Nombre</th></tr>
     </thead>
     <tbody data-bind="foreach: nuevos_diagnosticos_ini">
         <tr>
             <td><input data-bind="value: consecutivo" disabled class="form-control"></input></td>
             <td><input data-bind="value: nombre, style: { size: 80}" disabled class="form-control"></input></td>
             <td><button data-bind="click: $root.removediagini" class="btn btn-danger btn-sm"
               >Quitar</button></td>
         </tr>
     </tbody>
  </table>
</div>
<div class="form-group">
	{!!Form::label('subjetivo_1','Subjetivo:')!!}
	<textarea name="subjetivo" class="form-control" id="subjetivo"><?php echo $soap->subjetivo;?></textarea>
</div>
<div class="form-group">
	{!!Form::label('objetivo_1','Objetivo:')!!}
	<textarea name="objetivo" class="form-control" id="objetivo"><?php echo $soap->objetivo;?></textarea>
</div>
<div class="form-group">
	{!!Form::label('analilis_1','Análisis:')!!}
	<textarea name="analisis" class="form-control" id="analisis"><?php echo $soap->analisis;?></textarea>
</div>
<div class="form-group">
	{!!Form::label('plan_1','Plan:')!!}
	<textarea name="plan" class="form-control" id="plan"><?php echo $soap->plan;?></textarea>
</div>
<div class="form-group">
  <table>
    <thead>
       <tr><th colspan="2"><h4 align="center">Lista de diagnósticos finales previos</h4></th></tr>
       <tr><th>Folio de diagnóstico</th><th>Nombre</th></tr>
      </thead>
      <tbody data-bind="foreach: { data: diagnosticos_previos, as: 'diagnostico' }">
          <tr data-bind=" if: diagnostico.tipo()=='Final' ">
              <td><input data-bind="value: diagnostico.id()" disabled ></input></td>
              <td><input data-bind="value: diagnostico.nombre()" disabled ></input></td>
          </tr>
      </tbody>
  </table>
</div>
<div class="form-group">
  {!!Form::label('objetivo_1','Diagnóstico final:')!!}
  <input  class="form-control" name=name="difinal"  id="difinal" data-bind="value: difinal" placeholder="Su diagnóstico final..." autocomplete="off">
  <button id="btnAgregar" data-bind="click: $root.anadirdiagfin"
      class="btn btn-primary btn-sm">Añadir a lista de diganósticos</button>
</div>
<div class="form-group">
  <table data-bind="visible: nuevos_diagnosticos_fin().length > 0">
    <thead>
         <tr><th># De diagnóstico final</th><th>Nombre</th></tr>
     </thead>
     <tbody data-bind="foreach: nuevos_diagnosticos_fin">
         <tr>
             <td><input data-bind="value: consecutivo" disabled class="form-control"></input></td>
             <td><input data-bind="value: nombre, style: { size: 80}" disabled class="form-control"></input></td>
             <td><button data-bind="click: $root.removediagfin" class="btn btn-danger btn-sm"
               >Quitar</button></td>
         </tr>
     </tbody>
  </table>
</div>
<br></br><br></br><br></br><br></br>
