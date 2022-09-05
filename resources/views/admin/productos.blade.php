
@extends('layouts.admin.crud.list')
@section('content')
    <h1>Lista de Productos</h1>
    <div class="row py-4 text-right justify-content-end">
        <div class="col">
            <button type="button" id="createProducto" class="btn btn-success d-block float-right" data-toggle="modal" data-target="#ajaxModal"><i class="fas fa-user-plus"></i> Crear</button>
        </div>
        
    </div>
    <div class="row py-4">
        <div class="col">
            <table class="table productos-table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col"><i class="fas fa-user"></i> Nombre</th>
                    <th scope="col"><i class="fas fa-at"></i> Descripcion</th>
                    <th scope="col"><i class="fas fa-venus-mars"></i> Precio</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <br>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="ajaxModal" tabindex="-1" aria-labelledby="ajaxModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="ajaxModalLabel">Crear Producto</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary" role="alert">
                        Los campos con asteriscos (*) son obligatorios
                    </div>
                    <form id="productoForm" name="productoForm" class="form-horizontal" >
                        @csrf
                        <input type="hidden" name="id" id='id'>
                        <div class="form-group">
                            <label for="nombre">Nombre completo <span class="text-danger">*</span></label>
                            {!! Form::text('nombre', null, array('id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Nombre Producto', 'required' => 'required' )) !!}
                        </div>
                        <div class="form-group">
                            <label for="codigo">Codigo Producto <span class="text-danger">*</span></label>
                            {!! Form::text('codigo', null, array('id' => 'codigo', 'class' => 'form-control', 'placeholder' => 'Codigo Producto', 'required' => 'required' )) !!}
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio <span class="text-danger">*</span></label>
                            {!! Form::text('precio', null, array('id' => 'precio', 'class' => 'form-control', 'placeholder' => 'Precio', 'required' => 'required' )) !!}
                        </div>
                        <div class="form-group">
                            <label for="proveedor">Proveedor <span class="text-danger">*</span></label>
                            {!! Form::text('proveedor', null, array('id' => 'proveedor', 'class' => 'form-control', 'placeholder' => 'Proveedor', 'required' => 'required' )) !!}
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado Producto <span class="text-danger">*</span></label>
                            {!! Form::text('estado', null, array('id' => 'estado', 'class' => 'form-control', 'placeholder' => 'Estado Producto', 'required' => 'required' )) !!}
                        </div>
                        
                        <button id="save" type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
