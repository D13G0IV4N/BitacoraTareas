@extends('adminlte::page')

@section('title', 'Assets Subidos')

@section('content_header')
    <h1>Assets Subidos</h1>
@stop

@section('content')
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Botón para crear nuevo asset --}}
<a href="{{ route('assets.create') }}" class="btn btn-success mb-3">
    <i class="fas fa-plus-circle"></i> Nuevo Asset
</a>

<div class="row">
  @forelse($assets as $asset)
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <strong>{{ $asset->title ?? 'Sin título' }}</strong>
        </div>
        <div class="card-body text-center">

          @if($asset->image)
            <a href="{{ route('assets.image', $asset->image) }}" target="_blank">
              <img src="{{ route('assets.image', $asset->image) }}"
                   class="img-fluid rounded mb-2"
                   style="max-height: 150px;">
            </a>
          @elseif($asset->video_path)
            <video controls style="width: 100%; max-height: 180px;">
              <source src="{{ route('assets.video', $asset->video_path) }}" type="video/mp4">
              Tu navegador no soporta la etiqueta video.
            </video>
          @else
            <p class="text-muted">Sin imagen ni video</p>
          @endif

        </div>
        <div class="card-footer text-muted text-center">
          Subido: {{ $asset->created_at->format('d/m/Y H:i') }}
        </div>
      </div>
    </div>
  @empty
    <div class="col-12">
      <div class="alert alert-warning text-center">
        No hay assets subidos aún.
      </div>
    </div>
  @endforelse
</div>
@stop
