@extends('layouts.adminlte')

@section('title', 'Editar orden')
@section('page_title', 'Editar orden de servicio')

@section('content')
<div class="card">
    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('ordenes.update', $orden) }}">
            @csrf
            @method('PUT')

            {{-- Solo lectura --}}
            <div class="mb-3">
                <label class="form-label">Cliente</label>
                <input type="text" class="form-control" value="{{ $orden->cliente->id_cliente }} - {{ $orden->cliente->nombre }} {{ $orden->cliente->apellido }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" value="{{ $orden->usuario->id_usuario }} - {{ $orden->usuario->username }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Código de la orden</label>
                <input type="text" class="form-control" value="{{ $orden->codigo_orden }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" rows="3" disabled>{{ $orden->descripcion }}</textarea>
            </div>

            {{-- Editables --}}
            <div class="mb-3">
                <label for="tipo_servicio" class="form-label">Tipo de servicio</label>
                <select name="tipo_servicio" id="tipo_servicio" class="form-select" required>
                    @foreach (\App\Models\OrdenServicio::TIPOS_SERVICIO as $tipo)
                        <option value="{{ $tipo }}" {{ old('tipo_servicio', $orden->tipo_servicio) == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="prioridad" class="form-label">Prioridad</label>
                <select name="prioridad" id="prioridad" class="form-select" required>
                    @foreach (\App\Models\OrdenServicio::PRIORIDADES as $p)
                        <option value="{{ $p }}" {{ old('prioridad', $orden->prioridad) == $p ? 'selected' : '' }}>{{ $p }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" id="estado" class="form-select" required>
                    @foreach (\App\Models\OrdenServicio::ESTADOS as $e)
                        <option value="{{ $e }}" {{ old('estado', $orden->estado) == $e ? 'selected' : '' }}>{{ $e }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha_cierre_estimada" class="form-label">Fecha de cierre estimada</label>
                <input type="date" name="fecha_cierre_estimada" id="fecha_cierre_estimada" class="form-control"
                       value="{{ old('fecha_cierre_estimada', $orden->fecha_cierre_estimada?->format('Y-m-d')) }}">
            </div>

            <a href="{{ route('ordenes.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar orden</button>
        </form>

    </div>
</div>
@endsection