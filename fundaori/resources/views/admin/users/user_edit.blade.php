@extends('admin.master')

@section('title', 'CATÁLOGO')




@section('content') 

<style>
/*style button*/
   
</style>
<div class="container-fluid mtop20">
    <div class="row">            
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                          <i class="fa fa-user" aria-hidden="true"></i> {{ $u->name }} {{ $u->lastname}} <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu">
                      <a class="dropdown-item" tabindex="-1" href="{{ url('/administrar/users/all')}}"><i class="fa fa-envelope" aria-hidden="true"></i> Enviar correo</a> 
                      <a class="dropdown-item" tabindex="-1" href="{{ url('/administrar/users/all')}}"><i class="fa fa-bell" aria-hidden="true"></i> Enviar Notificación</a> 
                      <a class="dropdown-item" tabindex="-1" href="{{ url('/administrar/users/all')}}"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</a>  
                  </li>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
					<div class="container-fluid ">
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
                    <div class="container-fluid mtop20">
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header text-white"
                                 style="background: url('/admin/dist/img/photo1.png') center center;">
                              <h3 class="widget-user-username text-right">{{ $u->name }} {{ $u->lastname}}</h3>
                              <h5 class="widget-user-desc text-right">{{ $u->role }}</h5>
                            </div>
                            <div class="widget-user-image">
                                @if(is_null($u->avatar))
                                    <img class="img-circle"  src="{{ url('/static/images/default_avatar.png')}}">  
                                @else 
                                    <img class="img-circle"  src="{{ url('/uploads_users/'.$u->id.'/av_'.$u->avatar )}}">
                                @endif      
                            </div>
                            <div class="card-footer">
                              <div class="row">
                                <div class="col-sm-4 border-right">
                                  <div class="description-block">
                                    <h5 class="description-header">Teléfono</h5>
                                        @if(is_null($u->phone))
                                            <span class="description-text"> S/N </span>
                                        @else 
                                            <span class="description-text">{{ $u->phone}}</span>
                                        @endif 
                                  </div>
                                </div>
                                <div class="col-sm-8 border-right">
                                  <div class="description-block">
                                    <h5 class="description-header">Correo electrónico</h5>
                                    <span class="description-text">{{ $u->email }}</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>					
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Tipo de usuario</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body p-0">
                            @if(kvfj(Auth::user()->permissions, 'user_edit')) 
                                {{ Form::open(['url' => '/administrar/user/'.$u->id.'/edit']) }}
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                            </div>
                                            {!! form::select('user_type', getRoleUserArray('list', null), $u->role, ['class' => 'form-control']) !!}
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row mtop16">
                                    <div class="col-md-12">
                                        {!! form::submit('Guardar', ['class' => 'btn btn-block btn-primary btn-lg'])!!}
                                    </div>
                                </div>
                                {{ Form::close()}}
                            @endif
                        </div>
                      </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Mensajes</h3>
            
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                        </div>   
                        <div class="card-body p-0">
                          <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-envelope"></i> Correo(s)
                                <span class="badge bg-primary float-right">0</span>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-bell"></i> Notifiacción(es)
                                <span class="badge bg-primary float-right">0</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
                
            </div>
        </div>
        
        
    </div>
</div>





@stop
