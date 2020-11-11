<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700">
   
    
</head>
<body>
    
    <div class="pricingdiv">
        <ul class="theplan">
            <li class="title"><b>Clave de acceso</b></li>
            <li><b>Email:</b> {{ $email }}</li>
            <li>Este es un correo ha sido generado de forma automática</li>
            <li>Su clave de acceso es: </li>
            <li style="background: rgb(40, 30, 185); color:white">
                <center>  <h4 style="font-size: 4em">  {{ $Clave }}   </h4>   </center>               
            </li>
        </ul>
    </div>

    
    
</body>
</html>