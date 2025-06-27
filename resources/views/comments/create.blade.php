@extends('adminlte::page')

@section('title', 'Nuevo Comentario')

@section('content_header')
    <h1>Crear Comentario</h1>
@stop

@section('content')
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf

        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label>Actividad</label>
                    <select name="activity_id" class="form-control" required>
                        <option value="" disabled selected>Selecciona una actividad</option>
                        @foreach ($activities as $activity)
                            <option value="{{ $activity->id }}" {{ old('activity_id') == $activity->id ? 'selected' : '' }}>
                                {{ $activity->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Usuario</label>
                    <select name="user_id" class="form-control" required>
                        <option value="" disabled selected>Selecciona un usuario</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Comentario</label>
                    <textarea name="comment" class="form-control" rows="4" required>{{ old('comment') }}</textarea>
                </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-success">Guardar</button>
                <a href="{{ route('comments.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
@stop
