@extends('sitio.master')
@section('title', 'SERVICIOS')

@section('busqueda')
<div class="tmp-widget tmp-search-widget tmp-hidden" id="tmp-search-widget">
    <form action="#" method="get">
        <input class="tmp-input" type="text" name="keyword" value="" placeholder="Buscar Producto..." />
        <button class="tmp-button" type="submit">Buscar <i class="fa fa-angle-right"></i></button>
    </form>
</div>
@endsection



@section('form-busqueda')
<a style="width: 50px" href="#" class="tmp-widget-toggle" data-target="#tmp-search-widget"><i class="fa fa-search"></i></a>
@endsection  


@section('content')

    <link rel="stylesheet" href="{{asset('lib/css/latest/vegas.min.css')}}">
    <link rel="stylesheet" href="{{asset('lib/css/demo2.css')}}">

  
    <div class="contenedor">
        <img class="logo" src="{{asset('images/user.png')}}" />
        <div class="characters">
            <ul class="characters-list">    
                <li><a href="#" data-character="Nancy">Poleras</a></li>
                <li><a href="#" data-character="Marv">Tazones</a></li>
                <li><a href="#" data-character="Dwight">Gorras</a></li>
                <li><a href="#" data-character="Johnny">Mascarillas</a></li>
                <li><a href="#" data-character="Ava">Polerones</a></li>              
                <!-- 
                    
                <li><a href="#" data-character="Hartigan">Banderires</a></li>
                <li><a href="#" data-character="Gail">Estampados</a></li>  
                <li><a href="#" data-character="Roark">Powers Boothe</a></li>
                <li><a href="#" data-character="Joey">Ray Liotta</a></li>
                <li><a href="#" data-character="Manute">Dennis Haysbert</a></li>
                -->                
            </ul>
            <div class="characters-poster"></div>
        </div>
    </div>

    <div class="orientation">
        <img src="{{asset('lib/img/rotate.svg')}}">
    </div>

    <script src="{{asset('lib/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('lib/js/vegas.js')}}"></script>
    <script src="{{asset('lib/js/app.min.js')}}"></script>
    <script src="{{asset('lib/js/demo.js')}}"></script>
@endsection   