<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaRequest;
use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Cita::all());

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
    public function store(CitaRequest $request)
    {
        //
        $validated = $request->validated();
        $cita = Cita::create($validated);
        return  response()->json(['mensaje'=>'Cita guardada exitosamente'],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        $cita = Cita::findOrFail($id);

        if(is_null($cita)){
            return response()->json(['mensaje'=> 'Cita no encontrada'],404);
        }
        return response()->json($cita::find($id),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(CitaRequest $request, int $id)
    {

        $cita = Cita::findOrFail($id);

        if(is_null($cita)){
            return response()->json(['mensaje'=> 'Cita no encontrada'],404);
        }

        $validated = $request->validated();
        $cita->fill($validated);
        $cita->save();
        return response()->json(['mensaje'=> 'Cita actualizada'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $cita = Cita::findOrFail($id);
        if(is_null($cita)){
            return response()->json(['mensaje'=> 'Cita no encontrada'],404);
        }
        $cita->delete();
        return response()->json(['mensaje'=>'Cita eliminada correctamente'],200);
    }

    public function getCitasByFecha(string $fecha)
    {
        $citas = Cita::where('fecha',$fecha)->where('is_atendido',0)->get();
        if(is_null($citas)){
            return response()->json(['mensaje'=> 'Fecha sin citas'],404);
        }
        return response()->json($citas,200);
    }

    public function getCitasByUser(int $id)
    {
        $citas = Cita::where('user_od',$id)->where('is_atendido',0)->get();
        if(is_null($citas)){
            return response()->json(['mensaje'=> 'Usuario sin citas'],404);
        }
        return response()->json($citas,200);
    }
}
