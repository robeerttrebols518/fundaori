<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>LINEAGRAFIC::@yield('title')</title>
        <meta name="csrf-token" content="{{csrf_token()}}">  
        <meta name="routeName" content="{{Route::currentRouteName()}}">  


        
 
        
        <script src="{{asset('static/lib/ckeditor/ckeditor.js')}}"></script>
        <link href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet" >
        <link href="{{asset('admin/dist/css/adminlte.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/tmp.blue.css')}}" id="tmp-style">

        <!-- puntos suepensivos -->        
        <link rel="stylesheet" href="{{asset('css/puntos.suspensivos.css')}}">


        
        <!-- bootstrap-input-spinner -->
        <script src="{{asset('js/bootstrap-input-spinner.js')}}"></script>
        <script>
            $("input[type='number']").inputSpinner()
        </script>

        <style type="text/css">
            #global {
            height: 250px;
            width: 100%;
            overflow-y: scroll;
            overflow-x: hidden;
            }
            #mensajes {
                width: 100%;
                height: auto;
            }
        </style>

        <style>
            .dropdown {
            position: relative;
            display: inline-block;
            }
        </style>



    </head>



    <body class="is-tmp">


      
        <div class="some-internets tmp-page-body">

  
            @yield('content')


            
             
        </div>
















        <div class="tmp tmp-blur" id="tile-menu-pro">
            <div class="tmp-widget-container">
                @section('busqueda')
                @show
                <div class="tmp-clear"></div>
            </div>
            
            <div class="tmp-bar">
                
      
                <div class="">                      
                    <a class="tmp-brand" title="TMP - Tile Menu Pro">
                        <img src="{{asset('images/icono.png')}}" style="width:42px">
                    </a>
                    <div class="tmp-icons"> 




                        @if(Auth::guest()) 			
                        @else 
                            <div class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#">
                                    <i class="far fa-bell"></i> 
                                    @if(count(auth()->user()->unreadNotifications))
                                        <span class="badge badge-warning navbar-badge">
                                            {{ count(auth()->user()->unreadNotifications) }}
                                        </span>                                    
                                    @endif                                                                  
                                </a>     
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="width: 300px">                                
                                    <span class="dropdown-item dropdown-header">Notificaciones</span>                                
                                    <div class="dropdown-divider"></div>
                                    
                                    @forelse (auth()->user()->unreadNotifications as $notification)
                                        <a href="{{url('/mensajeria')}}" class="dropdown-item ">
                                            <i class="fas fa-envelope mr-2"></i> 
                                            <span style="width: 100px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">
                                                {{ $notification->data['description'] }}
                                            </span>
                                            
                                            <span class="pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                                        </a> 
                                        @empty
                                        <a  class="dropdown-item">
                                            <i class="fas fa-envelope mr-2"></i> Vacio
                                        </a> 
                                    @endforelse  
                                    @if(count(auth()->user()->unreadNotifications))
                                        <div class="dropdown-header"></div>   
                                        <a href="{{url('/markAsRead')}}" class="dropdown-item">
                                            <i class="fas fa-desktop mr-2"></i> Ver Todas
                                        </a> 
                                        <div class="dropdown-divider"></div>                                   
                                    @endif    
                                    

                                </div>                          
                            </div>
                        @endif








                        <div class="nav-item dropdown">
                            
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                @if (count(Cart::getContent()))
                                    <span class="badge badge-danger navbar-badge"> {{count(Cart::getContent())}} </span>
                                @else  
                                    <span class="badge badge-danger navbar-badge"> 0 </span>
                                @endif 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="width: 350px">
                                <div class="container-fluid mtop20">
                                    <div class="row total-header-section">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                                            <span class="badge badge-pill badge-danger">{{count(Cart::getContent())}}</span>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                            <p>Total: 
                                                <span class="text-info">
                                                    @if (count(Cart::getContent()))
                                                        $ {{number_format(Cart::getTotal(),2)}} 
                                                    @else  
                                                        $ 0.00
                                                    @endif 
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div id="global">
                                        <div id="mensajes"> 
                                            @foreach (Cart::getContent() as $item)                                   
                                                <div class="row cart-detail">
                                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                        <img src="{{ url('/uploads/'.$item->attributes->thumbnail) }}" class="img-fluid">
                                                    </div>
                                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                        <p class="puntos_suspensivos">{{$item->name}} </p>
                                                        <span class="count"> 
                                                            $ {{number_format($item->price,2)}}  x {{$item->quantity}} =                                                            
                                                        </span>
                                                        <span class="price text-info"> 
                                                            $  {{ number_format($item->price * $item->quantity,2)}}
                                                        </span>                                                         
                                                    </div>
                                                </div>
                                            @endforeach 
                                        </div>
                                    </div>                                    
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12 text-center ">
                                        <a href="{{url('/checkout')}}" class="btn btn-primary btn-block">Carrito de Compras</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="dropdown ">
                            <a  style="width: 70px" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                @if(Auth::guest()) 
                                    <img class="img-circle elevation-4"  src="{{ url('static/images/default_avatar.png')}}" style="width: 30px">  
                                @else 
                                    @if(is_null(Auth::user()->avatar))
                                        <img class="img-circle elevation-4"  src="{{ url('static/images/default_avatar.png')}}" style="width: 30px">  
                                    @else 
                                        <img class="img-circle elevation-4"  src="{{ url('/uploads_users/'.Auth::user()->id.'/av_'.Auth::user()->avatar )}}" style="width: 30px">
                                    @endif 
                                @endif  
                            </a>    
                            <div class="dropdown-menu dropdown-menu-right" style="width: 300px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-widget widget-user">
                                            
                                            

                                            @if(Auth::guest()) 
                                                <div class="widget-user-header text-white"
                                                    style="background: url('{{asset('lib/img/poster-login.jpg')}}') center center;">                                                    
                                                </div>
                                                <div class="widget-user-image">
                                                    <img class="img-circle" src="{{asset('static/images/default_avatar.png')}}"> 
                                                </div>
                                                <div class="card-footer text-black">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="info-box bg-info" style="cursor: pointer;" onclick="location.href='/ingresar'">
                                                                  <span class="info-box-icon"><i class="far fa-user"></i></span>                                                    
                                                                  <div class="info-box-content">
                                                                    <span class="info-box-text">Iniciar</span>
                                                                    <span class="info-box-number">Sesion</span>
                                                                  </div>
                                                                  <!-- /.info-box-content -->
                                                                </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="info-box bg-warning" style="cursor: pointer;" onclick="location.href='/register'">
                                                              <span class="info-box-icon"><i class="far fa-edit"></i></span>                                                    
                                                              <div class="info-box-content">
                                                                <span class="info-box-text">Crear</span>
                                                                <span class="info-box-number">Cuenta</span>
                                                              </div>
                                                              <!-- /.info-box-content -->
                                                            </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            @else 
                                                <div class="widget-user-header text-white"
                                                    style="background: url('{{asset('admin/dist/img/photo1.png')}}')">
                                                    <h3 class="widget-user-username text-right">Bienvenido</h3>
                                                    <h5 class="widget-user-desc text-right"> {{Auth::user()->name}} </h5>
                                                </div>  
                                                <div class="widget-user-image">
                                                    @if(is_null(Auth::user()->avatar))
                                                        <img class="img-circle" src="{{asset('static/images/default_avatar.png')}}"> 
                                                    @else 
                                                        <img class="img-circle"  src="{{ url('/uploads_users/'.Auth::user()->id.'/av_'.Auth::user()->avatar )}}">
                                                    @endif 
                                                </div>
                                                <div class="card-footer text-black">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                                <div class="info-box bg-success" style="cursor: pointer;" onclick="location.href='/account/edit'">
                                                                  <span class="info-box-icon"><i class="fa fa-user-plus"></i></span>                                                    
                                                                  <div class="info-box-content">
                                                                    <span class="info-box-text">Menú</span>
                                                                    <span class="info-box-number">Cuenta</span>
                                                                  </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="info-box bg-danger" style="cursor: pointer;" onclick="location.href='/logout'">
                                                              <span class="info-box-icon"><i class="fa fa-sign-out"></i></span>                                                    
                                                              <div class="info-box-content">
                                                                <span class="info-box-text">Cerrar</span>
                                                                <span class="info-box-number">Sesión</span>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif  
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>  
                        @section('form-busqueda')
                        @show  
                        
                    </div>
                </div>
                <div class="tmp-overlay"></div>
            </div>



            <nav>
                <div class="tmp-nav-container">
                    <div class="tmp-nav">
                        <div class="widget-user-header bg-warning" style="background: url('/images/fondo2.jpg') center center;">
                            <center><img src="{{asset('images/icono.png')}}" style="width:60%"></center>
                            <center> <h3 class="widget-user-username">LINEAGRAFI</h3> </center> 
                            <center> <h5 class="widget-user-desc" style="color:#fff">ventas@lineachile.cl</h5> </center> 
                        </div>
                        <ul class="tmp-tile">
                            <li style="width: 50%"><a href="{{url('/')}}" class="{{ (request()->is('/')) ? 'active' : '' }}"><i class="fa fa-home"></i><span class="tmp-label">Inicio</span></a></li>
                            <li style="width: 50%"><a href="{{url('/productos')}}" class="{{ (request()->is('productos')) ? 'active' : '' }}"><i class="fa fa-book" aria-hidden="true"></i>	<span class="tmp-label">Catálogo</span></a></li>
                            <li style="width: 50%"><a href="{{url('/checkout')}}" class="{{ (request()->is('checkout')) ? 'active' : '' }}"><i class="fa fa-shopping-cart"></i><span class="tmp-label">Carrito</span><span class="badge badge-danger navbar-badge">{{count(Cart::getContent())}}</span></a></li>
                            <li style="width: 50%"><a href="{{url('/servicios')}}" class="{{ (request()->is('servicios')) ? 'active' : '' }}"><i class="fa fa-wrench"></i><span class="tmp-label">Servicios</span></a></li>                            
                            <li style="width: 50%"><a href="#"><i class="fa fa-image"></i><span class="tmp-label">Galería</span><span class="badge badge-info navbar-badge">0</span></a></li>
                            <li style="width: 50%"><a href="{{url('/contact')}}" class="{{ (request()->is('contact')) ? 'active' : '' }}"><i class="fa fa-phone"></i><span class="tmp-label">Contact</span></a></li>
                            @if(Auth::guest()) 

                            @else   
                                @if(Auth::user()->role == 1)
                                <li style="width:100%"><a href="{{url('/administrar')}}" class="{{ (request()->is('administrar')) ? 'active' : '' }}"><i class="fa fa-cogs"></i><span class="tmp-label">Administrar</span></a></li>
                                <li style="width: 50%"><a href="{{url('/toten')}}" class="{{ (request()->is('toten')) ? 'active' : '' }}"><i class="fa fa-tablet"></i><span class="tmp-label">Totem</span></a></li>
                                <li style="width: 50%"><a href="{{url('/notification')}}" class="{{ (request()->is('notification')) ? 'active' : '' }}"><i class="fa fa-bell"></i><span class="tmp-label">Noticias</span></a></li>
                            
                            @endif
                            @endif
                            
                            
    
                            
                        </ul>
                        <ul class="tmp-social">
                            <li><a href="#" class="tmp-facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="tmp-google-plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="tmp-twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="tmp-youtube"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>
                <a class="tmp-toggle">
                    <i class="fa fa-times tmp-close"></i>
                    <i class="fa fa-bars tmp-open"></i>
                </a>
            </nav>
        </div>



   




        
                


    
        
         <script>
           function showAlert(){
                Swal.fire({
                    title: 'Producto',
                    text: "Ocultando el producto",
                    icon: 'info',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Listo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.checked = true;
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            };
        </script>
        


        <script src="{{asset('scripts/tmp.min.js')}}" type="text/javascript"></script>
        <!-- for demo purposes only -->

         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        <!-- Bootstrap 4 -->
        <script src="{{asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('/admin/dist/js/adminlte.min.js')}}"></script>
    





        
    </body>
</html>