@extends('adminlte::page')

@section('title', 'Editar Categoría')

@section('content_header')
    <h1>Editar Categoría</h1>
@stop

@section('content')
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nombre</label>
            <input name="name" 
                   class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name', $category->name) }}" required>
            @error('name') 
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>Descripción</label>
            <textarea name="description" 
                      class="form-control @error('description') is-invalid @enderror"
            >{{ old('description', $category->description) }}</textarea>
            @error('description') 
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-warning">Actualizar</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
