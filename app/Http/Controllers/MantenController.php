<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Manten;
use App\Tipopc;
use DB;
use Illuminate\Http\Request;

class MantenController extends Controller
{
    public function index()
    {
    	
        $mante = Tipopc::all();
        $mantenimientos = Manten::join('tipopcs','mantens.pc_id','=','tipopcs.id')
                                ->select('tipopcs.nombre','mantens.*')
                                ->get();
       //dd($mantenimientos);

    	return view('mantenpc.index', compact('mantenimientos', 'tipopc'));
    }

    public function create()
    {
    	$proactivos = Manten::all();
        $tipopc = Tipopc::all();
        //dd($tipopc);
    	return view('mantenpc.create', compact('proactivos', 'tipopc'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'fecha_manten' => 'required'
        
        
        ],[
        'fecha_manten.required' => '* Por favor ingresa la Fecha de mantenimiento.'
        
        ]);

    	$proactivos = new Manten();
    	$proactivos->t_equipo = $request->t_equipo;
        $proactivos->marca = $request->marca;
        $proactivos->modelo = $request->modelo;
        $proactivos->n_serie = $request->n_serie;
        $proactivos->pc_id = $request->pc_id;
        $proactivos->fecha_manten = Carbon::parse($request->fecha_manten);
    	$proactivos->save();
        //Flashy::success('alumno registrado correctamente');
       return redirect('mantenimiento')->with('flash', 'Mantenimiento registrado correctamente');
    }

    public function edit(Manten $manten)
    {
        

        return view('mantenpc.edit', compact('manten'));
    }

    public function update(Manten $manten, Request $request)
    {
        
        $manten->t_equipo = $request->t_equipo;
        $manten->marca = $request->marca;
        $manten->modelo = $request->modelo;
        $manten->n_serie = $request->n_serie;
        $manten->fecha_manten = Carbon::parse($request->fecha_manten);
        $manten->save();

        return redirect('mantenimiento')->with('flash', 'Mantenimiento editado correctamente');
    }

    public function destroy(Manten $manten)
    {
        $manten->delete();
        return redirect()->route('manetenimiento');
    }

}
