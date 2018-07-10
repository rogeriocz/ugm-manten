<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Manten;
use App\Tipopc;
use App\Proactivo;
use App\Profile;
use DB;
use Illuminate\Http\Request;

class MantenController extends Controller
{
    public function index(Manten $manten)
    {
    	//$proactivo = Proactivo::where('manten_id', $manten->id)->first();
        $mante = Tipopc::all();
        $mantenimientos = Manten::join('tipopcs','mantens.pc_id','=','tipopcs.id')
                                ->join('profiles', 'mantens.profile_id', '=', 'profiles.id')
                                ->select('tipopcs.nombre','mantens.*', 'profiles.nombre_p')
                                ->get();
        //$mantenimiento = Manten::where('marca');
       //dd($mantenimiento);

    	return view('mantenpc.index', compact('mantenimientos', 'tipopc'));
    }

    public function create()
    {
    	$mantenimiento = Manten::all();
        $tipopc = Tipopc::all();
        //dd($tipopc);
    	return view('mantenpc.create', compact('mantenimiento', 'tipopc'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'fecha_manten' => 'required'
        
        
        ],[
        'fecha_manten.required' => '* Por favor ingresa la Fecha de mantenimiento.'
        
        ]);

        $profile = new Profile();
       
        $profile->save();

    	$mantenimiento = new Manten();
    	$mantenimiento->t_equipo = $request->t_equipo;
        $mantenimiento->marca = $request->marca;
        $mantenimiento->modelo = $request->modelo;
        $mantenimiento->n_serie = $request->n_serie;
        $mantenimiento->pc_id = $request->pc_id;
        $mantenimiento->fecha_manten = Carbon::parse($request->fecha_manten);
        $mantenimiento->profile_id = $profile->id;
        //dd($mantenimiento);
    	$mantenimiento->save();

        $userproactivo = new Proactivo();
        $userproactivo->nombre = $request->nombre;
        $userproactivo->manten_id = $mantenimiento->id;
        //dd($userproactivo);
        $userproactivo->save();



        

        
       return redirect('mantenimiento')->with('flash', 'Mantenimiento registrado correctamente');
    }

    public function edit(Manten $manten)
    {
        
        $proactivo = $manten->proactivo;
        $prof = $manten->profile;
        //dd($pro);
        return view('mantenpc.edit', compact('manten', 'proactivo', 'prof'));
    }

    public function update(Manten $manten, Request $request)
    {
        //dd($manten->proactivo->nombre);
        $manten->t_equipo = $request->t_equipo;
        $manten->marca = $request->marca;
        $manten->modelo = $request->modelo;
        $manten->n_serie = $request->n_serie;
        $manten->fecha_manten = Carbon::parse($request->fecha_manten);
        
        $proactivo = $manten->proactivo;
        $proactivo->nombre = $request->nombre;

        $prof = $manten->profile;
        $prof->nombre_p = $request->nombre_p;

        $manten->save();
        $proactivo->save();
        $prof->save();

        

        return redirect('mantenimiento')->with('flash', 'Mantenimiento editado correctamente');
    }

    public function destroy(Manten $manten)
    {
        $manten->delete();
        return redirect()->route('manetenimiento');
    }

}
