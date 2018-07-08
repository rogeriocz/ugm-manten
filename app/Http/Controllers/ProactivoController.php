<?php

namespace App\Http\Controllers;
use App\Proactivo;
use Illuminate\Http\Request;

class ProactivoController extends Controller
{
    public function index()
    {
    	
        $proact = Proactivo::all();
       /* $mantenimientos = Manten::join('tipopcs','mantens.pc_id','=','tipopcs.id')
                                ->select('tipopcs.nombre','mantens.*')
                                ->get();*/
       dd($proact);

    	return view('index', compact('proact'));
    }
}
