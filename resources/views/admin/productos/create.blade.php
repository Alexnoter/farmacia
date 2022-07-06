@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
    <h1>Crear producto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.productos.store', 'autocomplete' =>  'off']) !!}

                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre:') !!}
                    {!! Form::text('nombre', null, ['class'  => 'form-control' , 'placeholder' => 'ingrese el nombre del producto']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug:') !!}
                    {!! Form::text('slug', null, ['class'  => 'form-control' , 'placeholder' => 'ingrese el slug del producto', 'readonly']) !!}
                </div>
                <div class="form-group" >
                    {!! Form::label('stock', 'Stock') !!}
                    {!! Form::number('stock', null, ['class' => 'form-control ', 'placeholder' => 'cantidad del producto']) !!}
                </div>
                <div class="container form-group row" >
                    {!! Form::label('precioVenta', 'Precio de venta :', ['class' => 'col']) !!}
                    {!! Form::number('precioVenta', null, ['class' => 'form-control col', 'placeholder' => '00.00']) !!}
                
                    {!! Form::label('precioCompra', 'Precio de compra :', ['class' => 'col ml-3']) !!}
                    {!! Form::number('precioCompra', null, ['class' => 'form-control col', 'placeholder' => '00.00']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('categoria_id', 'Categorias') !!}
                    {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <p  class="font-weight-bold">Estado</p>
                    <label>
                        {!! Form::radio('estado', 1, true) !!}
                        borrador
                    </label>
                    <label>
                        {!! Form::radio('estado', 2) !!}
                        publicado
                    </label>
                </div>
                <div class="form-group">
                    {!! Form::label('descripcion', 'Descripcion:') !!}
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('Crear producto', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready( function() {
            $("#nombre").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create( document.querySelector( '#descripcion' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>

@endsection