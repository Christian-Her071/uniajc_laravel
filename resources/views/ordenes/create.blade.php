@extends('layouts.adminlte')

@section('title', 'Crear orden')
@section('page_title', 'Nueva orden de servicio')

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

        <form method="POST" action="{{ route('ordenes.store') }}">
            @csrf

            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-select" required>
                    <option value="">Seleccione un cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id_cliente }}" {{ old('cliente_id') == $cliente->id_cliente ? 'selected' : '' }}>
                            {{ $cliente->id_cliente }} - {{ $cliente->nombre }} {{ $cliente->apellido }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="usuario_id" class="form-label">Usuario</label>
                <select name="usuario_id" id="usuario_id" class="form-select" required>
                    <option value="">Seleccione un usuario</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}" {{ old('usuario_id') == $usuario->id_usuario ? 'selected' : '' }}>
                            {{ $usuario->id_usuario }} - {{ $usuario->username }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="codigo_orden" class="form-label">Código de la orden</label>
                <input type="text" name="codigo_orden" id="codigo_orden" class="form-control" maxlength="50" value="{{ old('codigo_orden') }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required>{{ old('descripcion') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="tipo_servicio" class="form-label">Tipo de servicio</label>
                <select name="tipo_servicio" id="tipo_servicio" class="form-select" required>
                    @foreach (\App\Models\OrdenServicio::TIPOS_SERVICIO as $tipo)
                        <option value="{{ $tipo }}" {{ old('tipo_servicio') == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="prioridad" class="form-label">Prioridad</label>
                <select name="prioridad" id="prioridad" class="form-select" required>
                    @foreach (\App\Models\OrdenServicio::PRIORIDADES as $p)
                        <option value="{{ $p }}" {{ old('prioridad', 'Media') == $p ? 'selected' : '' }}>{{ $p }}</option>
                    @endforeach
                </select>
            </div>

            <a href="{{ route('ordenes.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar orden</button>
        </form>
    </div>
</div>
@endsection
