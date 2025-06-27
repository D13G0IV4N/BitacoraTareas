@extends('adminlte::page')

@section('title', 'Subir Asset')

@section('content_header')
    <h1>Subir Imagen y/o Video</h1>
@stop

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Nuevo Asset</h3>
      </div>
      <form action="{{ route('assets.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

          {{-- Título --}}
          <div class="form-group">
            <label for="title">Título</label>
            <input type="text"
                   name="title"
                   id="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}"
                   placeholder="Título del asset">
            @error('title')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- Imagen --}}
          <div class="form-group">
            <label for="image">Imagen (jpg, png)</label>
            <input type="file"
                   name="image"
                   id="image"
                   class="form-control @error('image') is-invalid @enderror"
                   accept="image/*">
            @error('image')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- Vídeo --}}
          <div class="form-group">
            <label for="video">Vídeo (mp4, avi)</label>
            <input type="file"
                   name="video"
                   id="video"
                   class="form-control @error('video') is-invalid @enderror"
                   accept="video/*">
            @error('video')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success">
            <i class="fas fa-upload"></i> Subir archivos
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop
