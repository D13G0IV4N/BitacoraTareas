{{-- resources/views/home.blade.php --}}
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
    </div>
@stop
