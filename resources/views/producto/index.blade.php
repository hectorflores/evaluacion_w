@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
    <div class="row" >
        <div class="card">
            <div class="card-header">
                Productos
            </div>
            <div class="card-body">
                <div>
                    <a href="producto/create" class="btn btn-primary">Agregar nuevo</a>
                </div>
                <div class="uper">
                    @if(session()->get('success'))
                        <div class="alert alert-success">
                        {{ session()->get('success') }}  
                        </div><br />
                    @elseif(session()->get('error'))
                         <div class="alert alert-danger">
                            {{ session()->get('error') }}  
                        </div><br />
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>SKU</td>
                            <td>Price</td>
                            <td>Descripcion</td>
                            <td>Categorias</td>
                            <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($producto as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->sku}}</td>
                                <td>{{number_format($row->price,2)}}</td>
                                <td>{{$row->description}}</td>
                                <td>
                                    @foreach($row->productoCategorias as $pcat)
                                        @foreach($pcat->categorias as $cat)
                                            {{$cat->code}}<br>
                                        @endforeach
                                    @endforeach
                                <td><a href="{{ route('producto.edit', $row->id)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('producto.destroy', $row->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                <div>
            </div>
        </div> 
    <div>
<div>
@endsection