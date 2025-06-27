@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel de Control</h1>
@stop

@section('content')
    <div class="row">

        {{-- Caja para Categorías --}}
        <div class="col-lg-6 col-12">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Categorías</h3>
                    <p>Gestiona tus categorías de actividades</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>
                <a href="{{ route('categories.index') }}" class="small-box-footer">
                    Ver Categorías <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Caja para Prioridades --}}
        <div class="col-lg-6 col-12">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Prioridades</h3>
                    <p>Gestiona los niveles de prioridad</p>
                </div>
                <div class="icon">
                    <i class="fas fa-flag"></i>
                </div>
                <a href="{{ route('priorities.index') }}" class="small-box-footer">
                    Ver Prioridades <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Caja para Actividades --}}
        <div class="col-lg-6 col-12">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Actividades</h3>
                    <p>Gestiona tus actividades registradas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <a href="{{ route('activities.index') }}" class="small-box-footer">
                    Ver Actividades <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Caja para Comentarios --}}
        <div class="col-lg-6 col-12">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Comentarios</h3>
                    <p>Gestiona los comentarios en actividades</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comments"></i>
                </div>
                <a href="{{ route('comments.index') }}" class="small-box-footer">
                    Ver Comentarios <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Caja para Usuarios --}}
        <div class="col-lg-6 col-12">
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>Usuarios</h3>
                    <p>Administra los usuarios del sistema</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">
                    Ver Usuarios <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Caja para Assets --}}
        <div class="col-lg-6 col-12">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>Assets</h3>
                    <p>Gestiona imágenes y videos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-photo-video"></i>
                </div>
                <a href="{{ route('assets.index') }}" class="small-box-footer">
                    Ver Assets <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>
@stop
