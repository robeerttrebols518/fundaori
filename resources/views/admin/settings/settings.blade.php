@extends('admin.master')
@section('title', 'ADMIN::CONFIGURACIÓN')

@section('breadcrumb')
    <li class="breadcrumb-item " aria-current="page">
        <a href=""> <i class="fas fa-cogs"></i> Configuraciones</a>        
    </li>

@endsection


@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h2 class="card-title">
                        <i class="fas fa-cogs"></i> Configuraciones
                    </h2> 
                </div>
                <div class="card-body">

                    {!! Form::open(['url' => '/administrar/settings/']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <label for="price">Precio</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                </div>
                                {!! form::text('name', Config::get('madecms.name'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="currency">Moneda</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                </div>
                                {!! form::text('currency', Config::get('madecms.currency'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="company_phone">Teléfono</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                </div>
                                {!! form::text('company_phone', Config::get('madecms.company_phone'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mtop16">
                        <div class="col-md-4">
                            <label for="map">Ubicaciones</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                </div>
                                {!! form::text('map', Config::get('madecms.map'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="maintenance">Modo Mantenimiento</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                </div>
                                {!! form::select('maintenance', ['0' => 'Desactivado', '1' => 'Activo'], Config::get('madecms.maintenance'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row mtop16">
                        <div class="col-md-4">
                            <label for="products_per_page">Productos a mostrar por página</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                </div>
                                {!! form::text('products_per_page', Config::get('madecms.products_per_page'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row mtop16">
                        <div class="col-md-12">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
                        </div>
                    </div>
                    {{ Form::close()}}
                </div>
            </div>
        </div>

    </div>
</div>






@endsection