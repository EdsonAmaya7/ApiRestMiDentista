<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return response()->json(Cliente::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        //
        $validated = $request->validated();
        $cliente = Cliente::create($validated);

        return  response()->json(['mensaje'=>'Cliente guardado exitosamente'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        $cliente = Cliente::findOrFail($id);

        if(is_null($cliente)){
            return response()->json(['mensaje'=> 'Cliente no encontrado'],404);
        }
        return response()->json($cliente::find($id),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, int $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        if(is_null($cliente)){
            return response()->json(['mensaje'=> 'Cliente no encontrado'],404);
        }

        $validated = $request->validated();
        $cliente->fill($validated);
        $cliente->save();
        return response()->json(['mensaje'=> 'Cliente actualizado'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $cliente = Cliente::findOrFail($id);

        if(is_null($cliente)){
            return response()->json(['mensaje'=> 'Cliente no encontrado'],404);
        }
        $cliente->delete();

        return response()->json($cliente);
    }

}
