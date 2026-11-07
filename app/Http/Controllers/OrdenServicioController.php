<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\OrdenServicio;
use App\Models\Cliente;
use App\Models\Usuario;

class OrdenServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get(['id_cliente', 'nombre', 'apellido']);
        $usuarios = Usuario::where('activo', true)->orderBy('username')->get(['id_usuario', 'username']);

        return view('ordenes.create', compact('clientes', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'cliente_id'    => 'required|exists:cliente,id_cliente',
            'usuario_id'    => 'required|exists:usuario,id_usuario',
            'codigo_orden'  => 'required|max:50|unique:orden_de_servicio,codigo_orden',
            'descripcion'   => 'required',
            'tipo_servicio' => 'required|max:50',
            'prioridad'     => ['required', Rule::in(OrdenServicio::PRIORIDADES)],
        ]);

        OrdenServicio::create($datos);

        return redirect()->route('ordenes.index')
            ->with('success', 'Orden de servicio creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdenServicio $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdenServicio $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
