<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proactivo extends Model
{
    protected $fillable = ['nombre', 'manten_id'];

    public function mantenimiento()
    {
    	return $this->belongsTo(Manten::class);
    }
}
