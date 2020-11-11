@extends('admin.master')

@section('title', 'LISTADO DE USUARIOS')

@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Usuarios</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
        <li class="breadcrumb-item active">Listado</li>
        </ol>
    </div>
@endsection


@section('content') 

<style>
/*style button*/
   
</style>
<div class="container-fluid mtop20">
    <div class="row">            
        <div class="col-md-9">    
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <ul class="nav nav-pills ml-auto p-2">                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-filter" aria-hidden="true"></i> Filtar <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" tabindex="-1" href="{{ url('/users/all')}}"><i class="fa fa-users"></i> Todos</a>
                                    <a class="dropdown-item" tabindex="-1" href="{{ url('/users/1')}}"><i class="fa fa-user"></i> Activos</a>
                                    <a class="dropdown-item" tabindex="-1" href="{{ url('/users/0')}}"><i class="fa fa-user-times"></i> Inactivos</a>                       
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                    <div class="table-responsive mailbox-messages">
                      <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Estado</th>
                                <th ></th>
                                <th ></th>
                            </tr>
                        </thead>
                        <tbody>    
                            @foreach ($users as $user) 
                            <tr>
                                <td>{{ $user->id }}</td>  
                                <td width="24px">
                                    @if(is_null($user->avatar))
                                        <img src="{{ url('/static/images/default_avatar.png')}}" class="img-fluid rounded-circle">  
                                    @else 
                                        <img src="{{ url('/uploads_users/'.$user->id.'/av_'.$user->avatar )}}" class="img-fluid rounded-circle">
                                    @endif
                                </td>
                                <td>{{ $user->name }} {{ $user->lastname }} </td> 
                                <td>{{ $user->email }}</td>                                     
                                <td>
                                    <ul class="nav nav-pills flex-column">                          
                                      <li class="nav-item">
                                        <a  class="nav-link">
                                          @switch($user->status)
                                            @case('0')
                                              <i class="far fa-circle text-warning"></i>
                                                @break
                                            @case('1')
                                              <i class="far fa-circle text-info"></i>
                                                @break
                                            @case('trash')
                                              <i class="far fa-circle text-danger"></i>
                                            @break
                                          @endswitch
                                        </a>
                                      </li>
                                    </ul>
                                </td>
                                <td>{{ getRoleUserArray(null, $user->role) }}</td> 
                                <td>{{ getUserStatusArray(null, $user->status) }}</td> 
                                <td>
                                    <div class="opts">
                                        @if(kvfj(Auth::user()->permissions, 'user_edit')) 
                                            <a href="{{ url('user/'.$user->id.'/edit')}}" data-toggle="tooltip" data-placement="top" title="Editar"> <i class="fas fa-edit"></i> </a>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                  <div class="opts">
                                        @if(kvfj(Auth::user()->permissions, 'user_permissions')) 
                                          <a href="{{ url('user/'.$user->id.'/permissions')}}" data-toggle="tooltip" data-placement="top" title="Permisos"> <i class="fas fa-cogs"></i> </a>
                                        @endif
                                  </div>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Información</h3>
            
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body p-0">
                          <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                              <a href="#" class="nav-link">
                                <i class="fa fa-users"></i> Activos
                                <span class="badge bg-primary float-right">{{ $users_public }}</span>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fa fa-users"></i> Inactivos
                                <span class="badge bg-danger float-right">{{ $users_eraser }}</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                        <!-- /.card-body -->
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
                              <i class="fa fa-envelope"></i> Enviar correo
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="fa fa-bell"></i> Enviar Notifiacción
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
