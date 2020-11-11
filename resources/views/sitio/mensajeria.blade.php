@extends('sitio.master')

@section('title', 'MEMSAJERIA')




@section('content') 





<div class="container-fluid mtop20">
    <div class="row">    
        <div class="col-md-6">    
            <div class="card card-primary card-outline">
                <div class="card-header" >
                    <h3 class="card-title" style="font-size: 40px !important;">
                        <i class="fa fa-ticket" aria-hidden="true"></i>	 Ticket #512
                    </h3>
                </div>                
                <div class="card-body p-0">
                  <div class="container-fluid ">
                    <div class="card">
                        <div class="card-block">   
                            {!! Form::open(['url' => '/notification', 'files'=>true, 'id'=>'form-id']) !!}                             
                                <div class="row mtop20">
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <img src="/images/default_avatar.png" alt="" class="btn-md">
                                    </div>
                                    <div class="col-md-8 col-sm-8 mtop20">
                                        <h4 class="card-title" style="font-size: 28px !important;">Comprador</h4>
                                        <h4 class="card-title" style="font-size: 42px !important;">Stffanie Osterich</h4>
                                    </div>   
                                </div>    
                                <div class="row">   
                                    <div class="col-md-12">                                        
                                        <label for="name">Enviar mensaje</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input name="title" type="hidden" value="ticket512">
                                            {!! form::text('description', 'pago verificado, preparando envio', ['class' => 'form-control', 'required']) !!}
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="row">         
                                    <div class="col-md-12">
                                        <a onclick="document.getElementById('form-id').submit();"><div class="buttonSquare darkblue"><i class="fa fa-bell"></i><span>Enviar</span></div></a>	                                        
                                    </div>
                                </div>
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
                                </div>
                            {!! Form::close() !!} 
                        </div>
                    </div>
                  </div>
                </div>
            </div>


            <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Producto(s)</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body p-0">
                      <div class="table-responsive">
                          <table class="table table-hover">
                              <thead>
                                <tr class="bg-primary">
                                  <th width="32px" scope="col">ID</th>
                                  <th scope="col">Imágen</th>
                                  <th scope="col">Producto</th>
                                  <th scope="col">Precio</th>
                                  <th scope="col">Cant</th>
                                  <th scope="col">Monto</th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>                                      
                                    1
                                  </td>
                                  <td>
                                    foto
                                  </td>
                                  <td>
                                    producto 1
                                  </td>
                                  <td>
                                  </td>
                                  <td>1000</td>
                                  <td>
                                      
                                  </td>
                                  <td>
                                  </td>
                                </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div> 
        </div>

   
        <div class="col-md-6">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card direct-chat direct-chat-warning">
                        <div class="card-header">
                          <h3 class="card-title">Msj Recididos</h3>      
                          <div class="card-tools">
                            <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning">3 Msj</span>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="direct-chat-messages">
                            @if(auth()->user())
                              @forelse ($postNotifications as $notification)
                                <!-- Message. Vendedor -->
                                <div class="direct-chat-msg">
                                  <div class="direct-chat-infos clearfix">
                                  <span class="direct-chat-name float-left">{{ auth()->user()->name }}</span>
                                    <span class="direct-chat-timestamp float-right">{{ $notification->created_at->diffForHumans() }}</span>
                                  </div>
                                  <img class="direct-chat-img" src="admin/dist/img/user3-128x128.jpg" alt="message user image">
                                  <div class="direct-chat-text">
                                    {{ $notification->data['description'] }}
                                  <a href="" class="direct-chat-timestamp float-right" data-id="{{ $notification->id }}">
                                      <i class="fa fa-check" aria-hidden="true"></i>
                                    </a>
                                  </div>                          
                                </div>
                              @empty 
                              @endforelse
                            @endif
                          </div>
                          <div class="card-footer">
                          <button type="submit" class="btn btn-primary" >Marcar todos como leidos</button>
                          </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>









        






        

        
    </div>
</div>





@stop
