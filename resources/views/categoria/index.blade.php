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
                Categorias
            </div>
            <div class="card-body">
                <div>
                    <a href="categoria/create" class="btn btn-primary">Agregar categoria</a>
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
                            <td>Code</td>
                            <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categoria as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->code}}</td>
                                <td><a href="{{ route('categoria.edit', $row->id)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('categoria.destroy', $row->id)}}" method="post">
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