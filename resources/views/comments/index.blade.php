@extends('adminlte::page')

@section('title', 'Comentarios')

@section('content_header')
    <h1>Comentarios</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <a href="{{ route('comments.create') }}" class="btn btn-primary mb-3">Nuevo Comentario</a>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Actividad</th>
                        <th>Usuario</th>
                        <th>Comentario</th>
                        <th>Fecha Comentario</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->activity->title ?? '—' }}</td>
                            <td>{{ $comment->user->name ?? '—' }}</td>
                            <td>{{ Str::limit($comment->comment, 50) }}</td>
                            <td>{{ \Carbon\Carbon::parse($comment->commented_at)->format('d/m/Y H:i') }}</td>
                            <td class="text-right">
                                <a href="{{ route('comments.edit', $comment) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar comentario?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay comentarios registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
