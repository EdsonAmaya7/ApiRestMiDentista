<?php

namespace App\Http\Controllers;

use App\Http\Requests\DentistaRequest;
use App\Models\Dentista;
use Illuminate\Http\Request;

class DentistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(DentistaRequest $request)
    {
        //
        $validated = $request->validated();
        $dentista = Dentista::create($validated);

        return  response()->json($dentista);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dentista  $dentista
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        $dentista = Dentista::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dentista  $dentista
     * @return \Illuminate\Http\Response
     */
    public function edit(Dentista $dentista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dentista  $dentista
     * @return \Illuminate\Http\Response
     */
    public function update(DentistaRequest $request, int $id)
    {
        //
        $dentista = Dentista::findOrFail($id);
        $validated = $request->validated();
        $dentista->fill($validated);
        $dentista->save();

        return response()->json($dentista);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dentista  $dentista
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $dentista = Dentista::findOrFail($id);
        $dentista->delete();

        return response()->json($dentista);
    }
}
