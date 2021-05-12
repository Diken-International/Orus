<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    //
    protected $table = 'clients';

    protected $fillable = [
    	'name',
    	'adress',
    	'rol',
    	'number_ceo'
    ];
}
