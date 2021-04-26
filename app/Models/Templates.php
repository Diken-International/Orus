<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Templates extends Model
{
    use SoftDeletes;

    protected $table = 'templates';

    protected $fillable = [
        'name',
        'content',
        'client_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'client_id');
    }
}
