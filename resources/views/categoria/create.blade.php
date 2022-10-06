@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row" >
        <div class="card">
            <div class="card-header">
                Crear Nuevo
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
                <form method="post" action="{{ route('categoria.store') }}"> 
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>

                        <div class="col-md-6">
                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

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
                                @foreach($categoria as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Crear</button> 
                            <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection