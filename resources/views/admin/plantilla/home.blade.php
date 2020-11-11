@extends('admin.master')

@section('title', 'LISTA DE USUARIOS')




@section('content') 



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
                  <h3 class="card-title">
                    <i class="fas fa-user mr-1"></i>
                    Registrar Usuario
                  </h3>
                  <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Cuenta</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Permisos</a>
                      </li>
                    </ul>
                  </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    
                    
                </div><!-- /.card-body -->
              </div>

        </div>
      
        
      
    </div>
</div>




@stop
