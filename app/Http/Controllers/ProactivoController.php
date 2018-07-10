<?php

namespace App\Http\Controllers;
use App\Proactivo;
use App\Manten;
use Illuminate\Http\Request;

class ProactivoController extends Controller
{
    public function index()
    {
    	//$proactivo = Proactivo::where('nombre')->get();
        //$proactivo = Proactivo::where('manten_id', $manten->id)->first();
       $proactivo = Proactivo::join('mantens','manten_id','=','mantens.id')
                                ->select('mantens.marca','mantens.t_equipo','proactivos.nombre')
                                ->get();
       dd($proactivo);

    	return view('index', compact('proact'));
    }
}
