<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return response()->json(User::all());
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
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
        $validated = $request->validated();
        $cita = User::create($validated);
        return  response()->json(['mensaje'=>'Usuario guardado exitosamente'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        $user = User::findOrFail($id);
        if(is_null($user)){
            return response()->json(['mensaje'=> 'usuario no encontrado'],404);
        }
        return response()->json($user::find($id),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, int $id)
    {
        //
        $user = User::findOrFail($id);
        if(is_null($user)){
            return response()->json(['mensaje'=> 'usuario no encontrado'],404);
        }

        $validated = $request->validated();
        $user->fill($validated);
        $user->save();
        return response()->json(['mensaje'=> 'usuario actualizado'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $user = User::findOrFail($id);
        if(is_null($user)){
            return response()->json(['mensaje'=> 'usuario no encontrado'],404);
        }
        $user->delete();
        return response()->json(['mensaje'=>'usuario eliminado correctamente'],200);
    }
}
