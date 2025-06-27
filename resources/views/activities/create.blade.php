@extends('adminlte::page')

@section('title', 'Nueva Actividad')

@section('content_header')
    <h1>Crear Actividad</h1>
@stop

@section('content')
    <form action="{{ route('activities.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Fecha de inicio</label>
                        <input type="date" name="start_at" class="form-control" value="{{ old('start_at') }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Fecha límite</label>
                        <input type="date" name="due_at" class="form-control" value="{{ old('due_at') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Prioridad</label>
                    <select name="priority_id" class="form-control" required>
                        @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}" {{ old('priority_id') == $priority->id ? 'selected' : '' }}>
                                {{ $priority->level }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Categoría</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Asignado a</label>
                    <select name="assigned_to" class="form-control">
                        <option value="">-- No asignado --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('assigned_to') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-success">Guardar</button>
                <a href="{{ route('activities.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
@stop
