<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Registro::all());
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
    public function store(RegistroRequest $request)
    {
        //
        $validated = $request->validated();
        $registro = Registro::create($validated);
        return  response()->json(['mensaje'=>'Registro guardado'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        $registro = Registro::findOrFail($id);
        if(is_null($registro)){
            return response()->json(['mensaje'=> 'registro no encontrado'],404);
        }
        return response()->json($registro::find($id),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(RegistroRequest $request, int $id)
    {
        //
        $registro = Registro::findOrFail($id);
        if(is_null($registro)){
            return response()->json(['mensaje'=> 'registro no encontrado'],404);
        }
        $validated = $request->validated();
        $registro->fill($validated);
        $registro->save();

        return response()->json(['mensaje'=>'Registro actualizado'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $registro = Registro::findOrFail($id);
        if(is_null($registro)){
            return response()->json(['mensaje'=> 'registro no encontrad0'],404);
        }
        $registro->delete();

        return response()->json(['mensaje'=>'registro eliminado'],200);
    }
}
