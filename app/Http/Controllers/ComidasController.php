<?php

namespace App\Http\Controllers;
use App\Models\Comidas;

use Illuminate\Http\Request;

class ComidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return 'Vista index()';
        $comidas = Comidas::all();
        return view('comida.index')->with('comidas',$comidas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comida.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comidas = new Comidas();
        $comidas->nombre = $request->get('nombre');
        $comidas->descripcion = $request->get('descripcion');
        $comidas->precio = $request->get('precio');
        $comidas->ingredientes = $request->get('ingredientes');
        $comidas->save();

        return redirect('/comidas');
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
        $comida = Comidas::find($id);
         return view('comida.edit')->with('comida',$comida);
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
        $comida = Comidas::find($id);
        $comida->nombre = $request->get('nombre');
        $comida->descripcion = $request->get('descripcion');
        $comida->precio = $request->get('precio');
        $comida->ingredientes = $request->get('ingredientes');
        $comida->save();

        return redirect('/comidas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comida = Comidas::find($id);        
        $comida->delete();

        return redirect('/comidas');
    }
}
