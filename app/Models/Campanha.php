<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    protected $fillable = [
        'id_grupo',
        'campanha',
        'ativa'
    ];
}
