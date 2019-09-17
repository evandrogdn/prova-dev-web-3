<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContaCorrente extends Model
{
    protected $fillable = [
        'agencia', 
        'inscr_federal', 
        'agencia', 
        'digito_agencia', 
        'conta_corrente',
        'conta_corrente_digito',
        'conta_corrente_saldo'
    ];
}
