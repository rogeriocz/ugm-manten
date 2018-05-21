<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Manten extends Model
{
   
	protected $guarded = [];
	protected $dates = ['fecha_manten'];

	

    public function equipo()
    {
    	return $this->belongsTo(Tipopc::class);
    }
}
