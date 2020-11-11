@extends('sitio.master')
@section('title', 'PLANTILLAS')


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
                                <h3 class="card-title">Carrito</h3>
                                    <div class="card-tools">
                                    <span data-toggle="tooltip" lass="badge badge-warning"> </span>
                                </div>
                            </div>
                            <div class="card-body">
                              <div class="container-fluid mtop20">
                                <div class="row">
                                  <div class="col-md-9 ">
                                    <div class="card card-primary card-outline">
                                      <div class="card-body box-profile">
                                          <div class="row">
                                            <div class="col-12 table-responsive">
                                              <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                  <th></th>
                                                  <th>Producto</th>
                                                  <th>Precio</th>
                                                  <th>Cantidad</th>
                                                  <th>Monto</th>
                                                  <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach (Cart::getContent() as $item)
                                                  <tr>
                                                    <td>
                                                      <div class="product-img">
                                                        <img src="{{ url('/uploads/'.$item->attributes->thumbnail) }}" class="img-size-50">
                                                      </div>
                                                    </td>
                                                    <td>{{ $item->name}}</td>
                                                    <td>{{ number_format($item->price,2)}}</td>
                                                    <td><span class="tag tag-success">{{ number_format($item->quantity)}}</span></td>
                                                    <td>{{ number_format($item->price * $item->quantity,2)}}</td>
                                                    <td>
                                                      <form action="{{route('cart_removeitem')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$item->id}}">
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                      </form>  
                                                    </td>    
                                                  </tr>
                                                @endforeach  
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="card card-primary card-outline">
                                      <div class="card-body box-profile">
                                          <div class="small-box bg-info">
                                            <div class="inner">
                                              <h3>Carrito</h3>                              
                                              <p>#1</p>
                                            </div>
                                            <div class="icon">
                                              <i class="fas fa-shopping-cart"></i>
                                            </div>
                                          </div>
                        
                                        <div class="table-responsive">
                                          <table class="table">
                                            <tr>
                                              <th style="width:50%">Subtotal:</th>
                                              <td style="text-align:right">${{number_format(Cart::getSubTotal(),2)}}</td>
                                            </tr>
                                            <tr>
                                              <th>Iva (9%)</th>
                                              <td style="text-align:right">${{number_format(Cart::getSubTotal() * 0.09,2)}}</td>
                                            </tr>
                                            <tr>
                                              <th>Descuento:</th>
                                              <td style="text-align:right">$0.00</td>
                                            </tr>
                                            <tr>
                                              <th>Total:</th>
                                              <td style="text-align:right">${{number_format(Cart::getSubTotal() + Cart::getSubTotal() * 0.09,2)}} </td>
                                            </tr>
                                          </table>
                                        </div>                       
                                        <a ><div class="buttonSquare darkblue"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span>Procesar</span></div></a>
                                      </div>
                                    </div>
                                    
                                    <div class="col-12">
                                      <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Imprimir</a>
                                    </div>
                                  </div>
                                </div>

                              </div>



                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="{{asset('js/customjs.js')}}" id="rendered-js" > </script>
@endsection