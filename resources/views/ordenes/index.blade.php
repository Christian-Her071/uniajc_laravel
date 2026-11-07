@extends('layouts.adminlte')

@section('title', 'Órdenes de servicio')
@section('page_title', 'Órdenes de servicio')

@section('content')

<div class="card">

    <div class="card-header d-flex align-items-center justify-content-between">
        <h3 class="card-title mb-0">Listado de Órdenes</h3>
    </div>

    <div class="card-body">

        {{-- Botón crear orden --}}
        <a href="{{ route('ordenes.create') }}"
           class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i>
            Crear nueva orden
        </a>

        {{-- Mensaje de confirmación --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show"
                 role="alert">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Cerrar">
                </button>
            </div>
        @endif

        {{-- Tabla de órdenes --}}
        <div class="table-responsive">

            <table class="table table-striped table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Usuario</th>
                        <th>Código orden</th>
                        <th>Descripción</th>
                        <th>Tipo servicio</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Fecha cierre estimada</th>
                        <th>Fecha creación</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($ordenes as $orden)

                        <tr>
                            <td>{{ $orden->cliente->id_cliente }} - {{ $orden->cliente->nombre }} {{ $orden->cliente->apellido }}</td>
                            <td>{{ $orden->usuario->id_usuario }} - {{ $orden->usuario->username }}</td>
                            <td>{{ $orden->codigo_orden }}</td>
                            <td>{{ $orden->descripcion }}</td>
                            <td>{{ $orden->tipo_servicio }}</td>
                            <td>{{ $orden->prioridad }}</td>
                            <td>{{ $orden->estado }}</td>
                            <td>{{ $orden->fecha_cierre_estimada?->format('Y-m-d') ?? 'Sin definir' }}</td>
                            <td>{{ $orden->created_at?->format('Y-m-d H:i') }}</td>

                            <td class="text-center">

                                {{-- Editar --}}
                                <a href="{{ route('ordenes.edit', $orden) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="fas fa-edit"></i>
                                    Editar

                                </a>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No hay ordenes registradas.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
