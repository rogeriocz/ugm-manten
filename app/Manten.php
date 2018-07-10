<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Manten extends Model
{
   
	protected $fillable = ['t_equipo', 'manten_id', 'marca', 'modelo', 'n_serie', 'compañia', 'placa', 'laboratorio', 'fecha_manten'];
	protected $dates = ['fecha_manten'];

	

    public function equipo()
    {
    	return $this->belongsTo(Tipopc::class);
    }

    public function proactivo()
    {
    	return $this->hasOne(Proactivo::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
