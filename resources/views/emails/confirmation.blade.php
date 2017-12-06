<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Confirmation</title>
</head>

<body style="background: linear-gradient(to  bottom right, #051D46 , #1D3F6F);">
    <br>
    <br>
    <div align="center">
        <h1 style="color:white">¡Gracias por registrarte con nosotros! </h1>
        <h3 style="color:white">De parte de todos los que integramos Mont&Go Software, te deceamos la mejor experiencia en nuestra plataforma.</h3>
    </div>
    <br><br><br>
    <div align="center">
		<a href="http://expediente.com.100-104-62-25.merkanet.mx/users/confirmation/{{$user->token}}" style="background-color: #008CBA;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;">CONFIRMAR</a>
    </div>
    <br><br><br><br>
    <div align="center">
        <img src="{{asset('assets/img/MONT&GO.png')}}" style="width:50%">
    </div>
    <br><br><br><br>
</body>
</html>