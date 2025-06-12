@extends('adminlte::page')

@section('title', 'Prioridades')

@section('content_header')
    <h1>Prioridades</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('priorities.create') }}" class="btn btn-primary mb-3">Nueva Prioridad</a>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Nivel</th>
                        <th>Color</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($priorities as $priority)
                        <tr>
                            <td>{{ $priority->id }}</td>
                            <td>{{ $priority->name }}</td>
                            <td>{{ $priority->level }}</td>
                            <td>
                                <span class="badge" style="background-color: {{ $priority->color }}">
                                    {{ $priority->color }}
                                </span>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('priorities.edit', $priority) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('priorities.destroy', $priority) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar prioridad?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay prioridades</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
