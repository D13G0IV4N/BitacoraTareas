@extends('adminlte::page')

@section('title', 'Editar Comentario')

@section('content_header')
    <h1>Editar Comentario</h1>
@stop

@section('content')
    <form action="{{ route('comments.update', $comment) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label>Actividad</label>
                    <select name="activity_id" class="form-control" required>
                        @foreach ($activities as $activity)
                            <option value="{{ $activity->id }}" {{ old('activity_id', $comment->activity_id) == $activity->id ? 'selected' : '' }}>
                                {{ $activity->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Usuario</label>
                    <select name="user_id" class="form-control" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $comment->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Comentario</label>
                    <textarea name="comment" class="form-control" rows="4" required>{{ old('comment', $comment->comment) }}</textarea>
                </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('comments.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
@stop
