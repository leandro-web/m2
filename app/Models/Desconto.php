<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desconto extends Model
{
    protected $fillable = [
        'id_campanha',
        'id_produto',
        'desconto',
        'data_inicio',
        'data_final'
    ];
}
