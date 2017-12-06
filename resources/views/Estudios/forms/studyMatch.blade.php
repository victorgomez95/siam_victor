<div class="form-group">

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
    outline-width: 0;
}
</style>

<div class="form-group">
<strong>Primera letra de diagnóstico</strong>
<select id="letra_diagnostico" class="form-control selectpicker"  data-live-search="true">
   <option selected>Elija letra</option>
   <option>A</option><option>B</option><option>C</option>
   <option>D</option><option>E</option><option>F</option>
   <option>G</option><option>H</option><option>I</option>
   <option>J</option><option>K</option><option>L</option>
   <option>M</option><option>N</option><option>Ñ</option>
   <option>O</option><option>P</option><option>Q</option>
   <option>R</option><option>S</option><option>T</option>
   <option>U</option><option>V</option><option>W</option>
   <option>X</option><option>Y</option><option>Z</option>
</select>
</div>
<div class="form-group">
<strong>Búsqueda de diagnósticos por nombre</strong>
  <input type="text" class="form-control" name="dname" id="dname" placeholder="Buscar...">
</div>
<div class="form-group">
   <strong>Diagnóstico al cual le asignará un estudio</strong>
   <select id="diagnosticos" class="form-control refresh-diagnosticos">
	   <option value="N/A">N/A</option>
   </select>
</div>
<div class="form-group">
   <strong>Primera letra de estudio</strong>
   <select id="letra_estudio" class="form-control selectpicker"  data-live-search="true">
      <option selected>Elija letra</option>
      <option>A</option><option>B</option><option>C</option>
    <option>D</option><option>E</option><option>F</option>
    <option>G</option><option>H</option><option>I</option>
    <option>J</option><option>K</option><option>L</option>
    <option>M</option><option>N</option><option>Ñ</option>
    <option>O</option><option>P</option><option>Q</option>
    <option>R</option><option>S</option><option>T</option>
    <option>U</option><option>V</option><option>W</option>
    <option>X</option><option>Y</option><option>Z</option>
   </select>
</div>
<div class="form-group">
<strong>Búsqueda de estudios por nombre</strong>
  <input type="text" class="form-control" name="sname" id="sname" placeholder="Buscar...">
</div>
<div class="form-group">
   <strong>Estudio que le asignará al diagnóstico</strong>
   <select id="estudios" class="form-control"></select>
</div>
<div class="form-group">
   <button id="btnAgregar2" data-bind="click: $root.agregarMatch"  class="btn btn-success">
   Agregar match</button>
</div>
<table class="table table-hover" data-bind="visible: matches().length > 0">
   <thead  class="thead-inverse" >
      <tr>
         <th colspan="5">
            <h4 align="center">Lista de diagnósticos matches hechos al momento</h4>
         </th>
      </tr>
      <tr style="background:#06092E;color:white">
         <th>Diagnóstico</th>
         <th>Estudio</th>
         <th>Propósito</th>
         <th>Metodología</th>
         <th>Acción</th>
      </tr>
   </thead>
   <tbody data-bind="foreach: { data: matches, as: 'match' }">
      <tr>
		 <td data-bind="text: match.nombre_diagnostico()"   ></input></td>
         <td data-bind="text: match.nombre_estudio()"       ></input></td>
         <td data-bind="text: match.proposito()"            ></input></td>
         <td data-bind="text: match.metodologia()"          ></input></td>
         <td data-bind="click: $root.removeNewMatch" class="btn btn-danger btn-sm">Quitar</button></td>
      </tr>
   </tbody>
</table>
<br></br><br></br>
<div class="form-group" data-bind="visible: matches().length > 0">
  <button id="btnAgregar" data-bind="click: $root.addMatch"  class="btn btn-success">
    Agregar Matches a la base de datos</button>
</div>
