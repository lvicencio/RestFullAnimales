<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;
class TipoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $tipos = Tipo::all();
      return response()->json(['datos'=>$tipos], 202);
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
  public function store(Request $request)
  {
      if (!$request->get('nombre') || !$request->get('caracteristicas')) {
        return response()->json(['mensaje'=>'Tipo no ingresado, datos invalidos','codigo'=>'422'],422);
      }
      Tipo::create($request->all());
      return response()->json(['mensaje'=>'Tipo de Animal creado con exito'],202);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $tipo = Tipo::find($id);
      if (!$tipo) {
          return response()->json(['mensaje'=>'Tipo de Animal no encontrado','codigo'=>404], 404);
      }
      return response()->json(['datos'=>$tipo], 202);
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
      $metodo= $request->method();
      $tipo= Tipo::find($id);
      if ($metodo==='PATCH') {
        $nombre=$request->get('nombre');
        if ($nombre!=null && $nombre!='') {
          $tipo->nombre=$nombre;
        }
        $caracteristicas=$request->get('caracteristicas');
        if ($caracteristicas!=null && $caracteristicas!='') {
          $tipo->caracteristicas=$caracteristicas;
        }
        $tipo->save();
        return response()->json(['mensaje'=>'Tipo de Animal creado con exito con metodo PATCH'],202);
      }
      $nombre=$request->get('nombre');
      $caracteristicas=$request->get('caracteristicas');
      if (!$nombre || !$caracteristicas) {
        return response()->json(['mensaje'=>'Faltan datos, Tipo NO Modificado','codigo'=>404], 404);
      }
      $tipo->nombre=$nombre;
      $tipo->caracteristicas=$caracteristicas;
      $tipo->save();
      return response()->json(['mensaje'=>'Tipo de Animal creado con exito con metodo PUT'],202);
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
