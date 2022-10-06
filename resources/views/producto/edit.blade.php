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
                <form method="POST" action="{{ route('producto.update', $row->id ) }}"> 
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
                        <label for="sku" class="col-md-4 col-form-label text-md-end">{{ __('SKU') }}</label>

                        <div class="col-md-6">
                            <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ $row->sku }}" required autocomplete="sku" autofocus>

                            @error('sku')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>  
                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $row->price }}" required autocomplete="price" autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>  
                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $row->description }}" required autocomplete="description" autofocus>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>  
                    <div class="row mb-3">
                        <label for="categorias" class="col-md-4 col-form-label text-md-end">{{ __('Categorias') }}</label>

                        <div class="col-md-6">
                            <select class="form-control @error('parent_id') is-invalid @enderror"  name="categorias[]" autocomplete="categorias" multiple> 
                                @foreach($categoria as $row)
                                    @if(in_array($row->id, $producto_categoria))
                                        <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                    @else
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('categorias')
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