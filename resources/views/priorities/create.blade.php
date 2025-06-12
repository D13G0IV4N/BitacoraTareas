@extends('adminlte::page')

@section('title', 'Crear Prioridad')

@section('content_header')
    <h1>Crear Prioridad</h1>
@stop

@section('content')
    <form action="{{ route('priorities.store') }}" method="POST">
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
            <label>Nivel</label>
            <input type="number" name="level" 
                   class="form-control @error('level') is-invalid @enderror" 
                   value="{{ old('level') }}" required>
            @error('level') 
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>Color</label>
            <input type="color" name="color" 
                   class="form-control @error('color') is-invalid @enderror" 
                   value="{{ old('color', '#000000') }}" required>
            @error('color') 
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('priorities.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
