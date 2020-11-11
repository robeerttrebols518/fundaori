@extends('admin.master')

@section('title', 'PERMISO DE USUARIO')




@section('content') 




  <link rel='stylesheet' href='/css/avatar.css'>

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

            
            <div class="card">
                <div class="card-header">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user" aria-hidden="true"></i> {{ $u->name }} {{ $u->lastname}} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" tabindex="-1" onclick="document.getElementById('form-id').submit();"><i class="fa fa-floppy-o" aria-hidden="true"></i>                            Guardar</a> 
                        <a class="dropdown-item" tabindex="-1" href="{{ url('/users/1')}}"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</a>  
                    </li>
                </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('/user/'.$u->id.'/permissions')}}" method="POST" id="form-id">
                        @csrf                        
                        <div class="row">
                            @foreach (user_permissions() as $key => $value)
                                <div class="col-md-4">
                                    <div class="card card-info card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title p-3">  {!! $value['icon'] !!} {{ $value['title'] }} </h3>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($value['keys'] as $k => $v)
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="{{ $k }}" name="{{ $k }}" @if(kvfj($u->permissions, $k)) checked @endif>
                                                    <label for="{{ $k }}" class="custom-control-label">{{ $v }}</label>
                                                </div>
                                            @endforeach 
                                        </div>
                                    </div>
                                </div> 
                            @endforeach                         
                        </div>  
                    </form>
                </div><!-- /.card-body -->
              </div>

        </div>
      
        
      
    </div>
</div>




@stop