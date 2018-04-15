<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\User;
use App\Sede;
use App\Producto;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sedes = Sede::orderBy('id', 'desc')->paginate(10);
        
        return view('sede.dash', compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('sede.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->input("name");
        $descrip = $request->input("descrip");
        Sede::create([
            'nombre'=> $name,
            'descripcion' => $descrip
            ]);
        $sedes = Sede::All();
        return redirect()->route('sedes.index')->with('message', 'Item updated successfully.');
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
        $sede = Sede::findOrFail($id);

        return view('sede.show', compact('sede'));
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
        $sede = Sede::findOrFail($id);

        return view('sede.edit', compact('sede'));
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
        $sede = Sede::findOrFail($id);

        $sede->id = $id;
        $sede->nombre = $request->input("name");
        $sede->descripcion = $request->input("description");

        $sede->save();

        return redirect()->route('sedes.index')->with('message', 'Item updated successfully.');
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
        $sede = Sede::findOrFail($id);
        $sede->delete();

        return redirect()->route('sedes.index')->with('message', 'Item deleted successfully.');
    }
}
