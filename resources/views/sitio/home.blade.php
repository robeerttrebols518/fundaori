@extends('sitio.master')

@section('title', 'PRINCIPAL')


@section('content') 

        <!-- for demo purposes only -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/content.styles.css')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/icono.png')}}">
        <!-- background slider -->
        <link rel="stylesheet" href="{{asset('lib2/css/latest/vegas.min.css')}}">
        <link rel="stylesheet" href="{{asset('lib2/css/styles.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/botones.iconos.css')}}">


        
<script src="{{asset('/lib2/js/jquery-2.1.3.min.js')}}"></script>

<div class="homepage">
    <div class="homepage-header">
        <div class="homepage-info">
            <h1>
                <span class="line1">CATÁLOGO</span>
                <span class="line2">2020</span>
                <span class="line3">Productos y Servicios</span>
            </h1>
            <nav class="homepage-menu">
                <ul>
                    <li class="pushable"><span class="banner">Poleras <a href="/demo">Personalizadas</a></span></li>
                    <li class="pushable"><span class="banner">Bolsas <a id="do-open-menu" href="#">TNT</a></span></li>
                    <li class="pushable"><span class="banner">Tasas <a id="version" href="">Personalizadas </a></span></li>
                    <li class="pushable"><span class="banner">Material <a id="version" href="">Ofinina </a></span></li>
                </ul>
            </nav>
        </div>
    </div>
</div>


<!-- background slider -->
<script src="{{asset('lib2/js/bar.js')}}"></script>
<script src="{{asset('lib2/js/app.min.js')}}"></script>
<script src="{{asset('lib2/js/latest/vegas.min.js')}}"></script>

@stop