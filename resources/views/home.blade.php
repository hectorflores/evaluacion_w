@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(Auth::user()->type==1)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Usuarios
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Administracion de usuarios</h5>
                        <p class="card-text">CRUD de usuarios.</p>
                        <a href="user" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Categorias
                </div>
                <div class="card-body">
                    <h5 class="card-title">Administrador de Categorias</h5>
                    <p class="card-text">CRUD para categorias y subcategorias.</p>
                    <a href="categoria" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Productos
                </div>
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text">CRUD productos.</p>
                    <a href="producto" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
