<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <div>
    <div style="position:absolute;top:10px;right:10px;">
      <img  src="http://laboratorio.jmresearch.org/images/logo.png" style="width:200px;"  />
    </div>
    <h2>
      Solicitud de prueba
    </h2>
    <div style="border-radius: 5px;border: 2px solid #01579B;padding: 20px; width: 50%;height: auto; ">
    <font style="color:#01579B">Paciente:</font>
    <strong>{{$pacient}}</strong><br>
    <font style="color:#01579B">Solicitante:</font>
    <strong>{{$emisor}}</strong><br>
    <font style="color:#01579B">Info. de contacto de solicitante:</font>
    <strong>{{'Correo: '.$mail}}</strong><br>
    <strong>{{'Teléfonos: '.$phones}}</strong><br>
    <font style="color:#01579B">Prueba solicitada:</font>
    <strong>{{$prueba}}</strong><br>
    <font style="color:#01579B">Fecha y hora solicitadas</font><br>
    <font style="color:#01579B">Fecha:</font><strong>{{$date}}</strong><br>
    <font style="color:#01579B">Hora:</font> <strong>{{$time}}</strong><br>
    <font style="color:#01579B">Mensaje:</font> <strong>{{$cuerpo}}</strong><br>
    </div>

  </div>
</body>
</html>
