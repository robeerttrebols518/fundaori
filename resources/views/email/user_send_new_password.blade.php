<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700">
    
    <style>
    
    .pricingdiv{
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      font-family: 'Source Sans Pro', Arial, sans-serif;
    }
    
    .pricingdiv ul.theplan{
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      border-top-left-radius: 50px;
      border-bottom-right-radius: 50px;
      color: white;
      background: #7c3ac9;
      position: relative;
      width: 500px; /* width of each table */
      margin-right: 10px; /* spacing between tables */
      margin-bottom: 1em;
      transition: all .5s;
    }
    
    .pricingdiv ul.theplan:hover{ /* when mouse hover over pricing table */
      transform: scale(1.05);
      transition: all .5s;
      z-index: 100;
      box-shadow: 0 0 10px gray;
    }
    
    .pricingdiv ul.theplan li{
      margin: 10px 20px;
      position: relative;
    }
    
    .pricingdiv ul.theplan li.title{
      font-size: 150%;
      font-weight: bold;
      text-align: center;
      margin-top: 20px;
      text-transform: uppercase;
      border-bottom: 5px solid white;
    }
    
    .pricingdiv ul.theplan:nth-of-type(2){
      background: #e53499;
    }
        
    .pricingdiv ul.theplan:nth-of-type(3){
      background: #2a2cc8;
    }
    
    .pricingdiv ul.theplan:last-of-type{ /* remove right margin in very last table */
      margin-right: 0;
    }
    
    /*very last LI within each pricing UL */
    .pricingdiv ul.theplan li:last-of-type{
      text-align: center;
      margin-top: auto; /*align last LI (price botton li) to the very bottom of UL */
    }  
    
    .pricingdiv a.pricebutton{
      background: white;
      text-decoration: none;
      padding: 10px;
      display: inline-block;
      margin: 10px auto;
      border-radius: 5px;
      color: navy;
      text-transform: uppercase;
    }

    </style>
    
</head>
<body>
    
    <div class="pricingdiv">
        <ul class="theplan">
            <li class="title"><b>Recuperacion de Contraseña</b></li>
        <li><b>Usuario:</b> {{ $name }}</li>
            <li>Esta es la nueva contraseña para nuestra plataforma</li>
            <li style="background: rgb(40, 30, 185)">
              <center>  <h2 style="font-size: 4em">  {{ $new_password }}   </h2>   </center>
               
            </li>
            <li>para iniciar sesión haga clic en el siguiente botón</li>
        <li><a class="pricebutton" href="{{url('/')}}" rel="nofollow"><span class="icon-tag"></span> Continuar </a></li>
        </ul>
    </div>

    
    
</body>
</html>