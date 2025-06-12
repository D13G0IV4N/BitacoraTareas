@extends('adminlte::page')

@section('title', 'Crear Categoría')

@section('content_header')
    <h1>Crear Categoría</h1>
@stop

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input name="name" 
                   class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name') }}" required>
            @error('name') 
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>Descripción</label>
            <textarea name="description" 
                      class="form-control @error('description') is-invalid @enderror"
            >{{ old('description') }}</textarea>
            @error('description') 
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
