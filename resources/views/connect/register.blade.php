@extends('sitio.master')
@section('title', 'CATÁLOGO::REGISTRARSE')

@section('content')



<div class="w3layouts-main"> 

	<div class="bg-layer">
		
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
		<div class="header-main">
			<div class="main-icon">
				<span class="fa fa-user-plus"></span>
			</div>
			<div class="header-left-bottom">
				{!! Form::open(['url' => '/register']) !!}
					<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="text" name="name" placeholder="Nombre" required=""/>
                    </div>
                    <div class="icon1">
						<span class="fa fa-user"></span>
						<input type="text" name="lastname" placeholder="Apellido" required=""/>
                    </div>
                    <div class="icon1">
						<span class="fa fa-envelope"></span>
						<input type="email" name="email" placeholder="correo" required=""/>
					</div>
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" name="password" placeholder="Contraseña" required=""/>
                    </div>
                    <div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" name="cpassword" placeholder="Confirmar Contraseña" required=""/>
					</div>
					<div class="bottom">
						<button class="btn">Ingresar</button>
					</div>
					{!! Form::close() !!} 
			</div>
		</div>
	</div>
</div>	


@stop