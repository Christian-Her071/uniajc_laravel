<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    $orden->load(['cliente', 'usuario']);

    return view('ordenes.edit', compact('orden'));
}

public function update(Request $request, OrdenServicio $orden)
{
    $datos = $request->validate([
        'tipo_servicio'         => 'required|max:50',
        'prioridad'             => ['required', Rule::in(OrdenServicio::PRIORIDADES)],
        'estado'                => ['required', Rule::in(OrdenServicio::ESTADOS)],
        'fecha_cierre_estimada' => 'nullable|date',
    ]);

    $orden->update($datos);

    return redirect()->route('ordenes.index')
        ->with('success', 'Orden de servicio actualizada correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
