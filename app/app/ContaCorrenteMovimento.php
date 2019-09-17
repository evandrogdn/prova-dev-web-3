<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContaCorrenteMovimento extends Model
{
    protected $fillable = [
        'conta_id',
        'descricao',
        'valor'
    ];
}
