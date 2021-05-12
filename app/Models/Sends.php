<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sends extends Model
{
    //
    protected $table = 'sends';

    protected $fillable = [
    	'proyect',
    	'data',
    	'template_id',
    	'client_id'
    ];

    public function getDataAttribute($value){
        return json_decode($value);
    }

    public function setDataAttribute($value){
        $this->attributes['data'] =  json_encode($value);
    }
}
