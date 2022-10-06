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
                Usuarios
            </div>
            <div class="card-body">
                <div>
                    <a href="user/create" class="btn btn-primary">Agregar nuevo</a>
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
                            <td>Username</td>
                            <td>Email</td>
                            <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{ route('user.edit', $user->id)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('user.destroy', $user->id)}}" method="post">
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