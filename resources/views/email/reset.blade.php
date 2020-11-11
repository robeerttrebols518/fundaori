@extends('sitio.master')
@section('title', 'CATÁLOGO::RESET')

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
				{!! Form::open(['url' => '/reset']) !!}  
					<div class="icon1">
						<span class="fa fa-envelope"></span>
						{!! form::text('email', $email, ['class' => 'form-control', 'required', 'readonly', 'placeholder' => 'Correo']) !!}
                    </div>
                    <div class="icon1">
						<span class="fa fa-user"></span>
                        {!! form::text('code', null, ['class' => 'form-control', 'required', 'placeholder' => 'Código de recuperación']) !!}
                    </div>
					<div class="bottom">
						<button class="btn">Resetear mi contraseña</button>
					</div>
					{!! Form::close() !!} 
			</div>
		</div>
	</div>
</div>	


@stop