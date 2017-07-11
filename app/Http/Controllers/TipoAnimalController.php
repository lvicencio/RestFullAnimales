<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;
use App\Animal;

class TipoAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $tipo = Tipo::find($id);
        $animales =$tipo->animales;
        if (!$animales) {
          return response()->json(['mensaje'=>'Animales no existen','codigo'=>404], 404);
      }
      return response()->json(['datos'=>$animales], 202);
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
    public function store(Request $request, $id)
    {//animal, 'nombre', 'habitad', 'caracteristicas','reproduccion','extremidades','tipo_id',
      if (!$request->get('nombre') || !$request->get('habitad')|| !$request->get('caracteristicas') ||
      !$request->get('reproduccion') || !$request->get('extremidades') ) {
        return response()->json(['mensaje'=>'Animal no ingresado, datos invalidos','codigo'=>'422'],422);
      }
      $tipo = Tipo::find($id);
      if (!$tipo) {
        return response()->json(['mensaje'=>'Tipo de Animal no existe', 'codigo'=>'404'],404);
      }


      Animal::create([
        'nombre'=>$request->get('nombre'),
        'habitad'=>$request->get('habitad'),
        'caracteristicas'=>$request->get('caracteristicas'),
        'reproduccion'=>$request->get('reproduccion'),
        'extremidades'=>$request->get('extremidades'),
        'tipo_id'=>$id
        ]);
      return response()->json(['mensaje'=>'Animal creado con exito','codigo'=>'201'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
