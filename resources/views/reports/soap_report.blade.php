<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hoja de registro</title>
    <link rel="stylesheet" type="text/css"><style>
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #5D6975;
      text-decoration: underline;
    }

    body {
      position: relative;
      width: 16cm;
      height: 29.7cm;
      margin: 0 auto;
      color: #001028;
      background: #FFFFFF;
      font-family: Arial, sans-serif;
      font-size: 12px;
      font-family: Arial;
    }

    header {
      padding: 10px 0;
      margin-bottom: 30px;
    }

    #logo {
      text-align: center;
      margin-bottom: 10px;
    }

    #logo img {
      width: 90px;
    }

    h1 {
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      margin: 0 0 0 0;
    }

    #project {
      float: left;
    }

    #project span {
      color: #5D6975;
      text-align: right;
      width: 52px;
      margin-right: 10px;
      display: inline-block;
      font-size: 0.8em;
    }

    #company {
      float: right;
      text-align: right;
    }

    #project div,
    #company div {
      white-space: nowrap;
    }

    table.issac {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    table.issac.issac tr:nth-child(2n-1) td {
      background: #F5F5F5;
      padding-top:      6px;
      padding-bottom:   6px;
    }

    table.issac th,
    table.issac td {
      text-align: center;
    }

    table.issac th {
      font-size: 13px;
      padding: 5px 20px;
      color: #5D6975;
      border-bottom: 1px solid #C1CED9;
      white-space: nowrap;
      font-weight: normal;
	    text-align: left;
    }

    table.issac .service,
    table.issac .desc {
      text-align: left;
    }

    table.issac td {
      padding: 20px;
      text-align: left;
    }

    table.issac td.service,
    table.issac td.desc {
      vertical-align: top;
    }

    table.issac td.unit,
    table.issac td.qty,
    table.issac td.total {
      font-size: 1.2em;
    }

    table.issac td.grand {
      border-top: 1px solid #5D6975;;
    }

    #notices .notice {
      color: #5D6975;
      font-size: 1.2em;
    }

    </style>
  </head>
  <body>
    <main>

	  	<h2>
				Hoja de nota médica
			</h2>

	  		<div style="border-radius: 5px;border: 2px solid #01579B;padding: 20px; width: 50%;height: auto; ">
				<font style="color:#01579B">Paciente:</font>
          <strong>
					       <?php echo $soap->date->pacient->nombre.' '.$soap->date->pacient->apaterno.' '.$soap->date->pacient->amaterno ?>
          </strong><br>
				<font style="color:#01579B">Doctor que atendió la consulta</font> <strong>
					<?php echo $soap->date->doctor->nombre.' '.$soap->date->doctor->apaterno.' '.$soap->date->doctor->amaterno ?></strong>  <br>
				<font style="color:#01579B">Fecha:</font><strong> <?php echo $soap->date->fecha ?> </strong><br>
				<font style="color:#01579B">Hora:</font> <strong> <?php echo $soap->date->hora ?></strong>  <br>
			  </div>

    	  <div style="position:absolute;top:10px;right:10px;">
    		  <img  src="http://laboratorio.jmresearch.org/images/logo.png" style="width:200px;"  />
    	  </div>


        <div style="width:100%; background:#8B342B;color:white;">
				<h2 align="left" style="padding-top:3px;padding-left:10px;padding-bottom:3px;">Análisis SOAP</h2>
			  </div>
        <table class="table issac">
          <thead><tr><th>Subjetivo</th></tr></thead>
          <tbody>
            <tr>
              <td class="service"><?php echo $soap->subjetivo ?></td>
            </tr>
          </tbody>
          <thead><tr><th>Objetivo</th></tr></thead>
          <tbody>
            <tr>
              <td class="service"><?php echo $soap->objetivo  ?></td>
            </tr>
          </tbody>
          <thead><tr><th>Análisis</th></tr></thead>
          <tbody>
            <tr>
              <td class="service"><?php echo $soap->analisis  ?></td>
            </tr>
          </tbody>
          <thead><tr><th>Plan</th></tr></thead>
          <tbody>
            <tr>
              <td class="service"><?php echo $soap->plan  ?></td>
            </tr>
          </tbody>
        </table>
        <br><br>
        <table style="width:100%;text-align:center">
          <thead>
            <tr style="text-align:center">
              <th colspan="2"> _____________________________ <br>Doctor</th>
              <th> _____________________________ <br> Cédula </th>
            </tr>
          </thead>
          <tbody>
            <tr style="text-align:center">
              <td class="service" colspan="2"></td>
              <td class="service"></td>
            </tr>
          </tbody>

          <thead>
            <tr style="text-align:center">
              <th colspan="3">
                  <br><br><br><br>
                   _____________________________  <br> Firma
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="service" colspan="3"></td>
            </tr>
          </tbody>
        </table>
        <br><br><br><br>
        <div id="notices">
          <div>NOTA:</div>
          <div class="notice">Si hay alguna inconsistecia en sus datos, puede modificarlos.</div>

          <div class="notice">Ésta hoja de registro fue creada en computadora y no es válida sin firma..</div>
        </div>
        <br><br>
    </main>
  </body>
</html>
