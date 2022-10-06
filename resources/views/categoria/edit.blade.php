@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row" >
        <div class="card">
            <div class="card-header">
                Editar registro
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                <form method="POST" action="{{ route('categoria.update', $row->id ) }}"> 
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $row->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('code') }}</label>

                        <div class="col-md-6">
                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $row->code }}" required autocomplete="code" autofocus>

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="parent_id" class="col-md-4 col-form-label text-md-end">{{ __('Parent') }}</label> 
                        <div class="col-md-6">
                            <select class="form-control @error('parent_id') is-invalid @enderror"  name="parent_id" autocomplete="parent_id">
                                <option value="">Seleccione</option>
                                @foreach($categoria as $cat)
                                    @if($row->parent_id == $cat->id)
                                        <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                                    @else
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('parent_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection