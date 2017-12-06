<form id="formulario_estudio">
<input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
<input id="id" class="form-control" type="hidden"></input>
<div class="form-group">
   <strong>Nombre del estudio</strong>
   <input id="nombre" class="form-control"></input>
</div>
<div class="form-group">
   <strong>Folio del estudio</strong>
   <input id="folio" class="form-control"></input>
</div>
<div class="form-group">
   <strong>Propósito del estudio</strong>
   <textarea id="proposito" class="textarea_css"></textarea>
</div>
<div class="form-group">
   <strong>Metodología usada en el estudio</strong>
   <textarea id="metodologia" class="textarea_css"></textarea>
</div>
<div class="form-group">
   <button id="btnAgregar2" type="submit" class="btn btn-primary btn-sm" Onclick="modifystudy();">
   Modificar estudio</button>
</div>
</form>
