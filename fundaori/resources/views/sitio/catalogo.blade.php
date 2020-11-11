@extends('sitio.master')
@section('title', 'PLANTILLAS')

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
    <!-- Fonts -->
<link href="{{asset('css/cart.css')}}" rel="stylesheet">
    <script>
        if (document.location.search.match(/type=embed/gi)) {
          window.parent.postMessage("resize", "*");
        }
    </script>

<div class="container-fluid mtop20">
    <div class="row">    
        <div class="col-md-12">
            @if (Session::has('message'))  
              <div class="alert alert-{{ Session::get('typealert') }} alert-dismissible fade show" role="alert">
                <h5><i class="icon fas fa-info"></i> {{ Session::get('message')}}</h5>				
                @if ($errors->any())
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>
                        {{ $error }}
                      </li>
                    @endforeach
                  </ul> 					
                @endif
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <script>
                  $('.alert').slideDown();
                  setTimeout(function(){ $('.alert').slideUp(); }, 5000);
                </script>
              </div>   
            @endif  
        </div>  
        <div class="col-md-12">
            <div class="row mtop20">
                    <div class="col-md-12">
                        <div class="card direct-chat direct-chat-warning">
                            <div class="card-header">
                                <h3 class="card-title">CATÁLOGO DE PRODUCTOS</h3>
                                    <div class="card-tools">
                                    <span data-toggle="tooltip" lass="badge badge-warning"> </span>
                                </div>
                            </div>
                            <div class="card-body">
                                
                                <div class="container-fluid mtop20">
                                    <div class="row">
                                        @foreach($products as $product)                                             
                                            <div class="col-md-4">
                                                <div class="card direct-chat direct-chat-warning">
                                                    <div class="card-header">   
                                                        <span class="badge badge-danger" style="font-size: 16px">${{ number_format($product->price,2)}}</span>                             
                                                        <div class="card-tools">
                                                            <span class="badge badge-warning"></span>
                                                            <button type="button" class="btn btn-tool" data-toggle="tooltip" data-widget="chat-pane-toggle" title="Agregar" >
                                                                <span class="badge badge-success" style="font-size: 18px">AGREGAR<i class="fa fa-cart-plus" aria-hidden="true"></i></span> 
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="direct-chat-messages">
                                                            <img src="{{ url('/uploads/'.$product->file_path.'/'.$product->image) }}" >
                                                        </div>
                                                        <div class="direct-chat-contacts">
                                                            <ul class="contacts-list">
                                                                <li>
                                                                    @if (count(Cart::getContent()))
                                                                        <a href="{{url('/checkout')}}" class="btn btn-block btn-primary btn-lg"> VER CARRITO <span class="badge badge-danger"></span></a>
                                                                    @endif
                                                                </li>
                                                                <li>  
                                                                    {!! Form::open(['url' => '/cart-add', 'files'=>true]) !!}   
                                                                        <p><input type="number" name="cantidad"  value="1" min="1" max="10" step="1"></p>                                                                    
                                                                        <input type="hidden" name="producto_id" value="{{$product->id}}">
                                                                        {!! form::submit('AGREGAR', ['class'=>'btn btn-block btn-danger btn-lg']) !!}
                                                                    {!! Form::close() !!} 
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-muted">
                                                        <button type="button" class="btn btn-tool" data-toggle="tooltip" data-widget="chat-pane-toggle" title="Agregar" >
                                                            <span class="badge badge-info" style="font-size: 16px" >{{ $product->name }}</span>  
                                                        </button>                                                        
                                                    </div>
                                                </div>
                                            </div>      
                                        @endforeach                                       
                                    </div>
                                </div>                                
                                
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>


<!-- bootstrap needs jQuery Spinner-->
<script src="{{asset('js/jquery-3.5.1.slim.min.js')}}"></script>
<script src="{{asset('js/bootstrap-input-spinner.js')}}"></script>        
<script>
    $("input[type='number']").inputSpinner()
    $(".buttons-only").inputSpinner({buttonsOnly: true})
</script>
@endsection