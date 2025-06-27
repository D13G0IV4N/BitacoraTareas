@extends('adminlte::page')

@section('title', 'Actividades')

@section('content_header')
    <h1>Actividades</h1>
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

    <a href="{{ route('activities.create') }}" class="btn btn-primary mb-3">Nueva Actividad</a>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Prioridad</th>
                        <th>Asignado a</th>
                        <th>Fecha Límite</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activities as $activity)
                        <tr>
                            <td>{{ $activity->id }}</td>
                            <td>{{ $activity->title }}</td>
                            <td>{{ $activity->category->name ?? '—' }}</td>
                            <td>{{ $activity->priority->level ?? '—' }}</td>
                            <td>{{ $activity->assignee->name ?? 'No asignado' }}</td>
                            <td>{{ \Carbon\Carbon::parse($activity->due_at)->format('d/m/Y') }}</td>
                            <td class="text-right">
                                <a href="{{ route('activities.edit', $activity) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('activities.destroy', $activity) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar actividad?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay actividades registradas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
