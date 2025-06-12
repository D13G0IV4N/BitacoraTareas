@extends('adminlte::page')

@section('title', 'Editar Prioridad')

@section('content_header')
    <h1>Editar Prioridad</h1>
@stop

@section('content')
    <form action="{{ route('priorities.update', $priority) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nombre</label>
            <input name="name" 
                   class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name', $priority->name) }}" required>
            @error('name') 
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>Nivel</label>
            <input type="number" name="level" 
                   class="form-control @error('level') is-invalid @enderror" 
                   value="{{ old('level', $priority->level) }}" required>
            @error('level') 
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>Color</label>
            <input type="color" name="color" 
                   class="form-control @error('color') is-invalid @enderror" 
                   value="{{ old('color', $priority->color) }}" required>
            @error('color') 
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-warning">Actualizar</button>
        <a href="{{ route('priorities.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
