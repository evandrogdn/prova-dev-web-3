<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input as Input;
use Illuminate\Http\Request as Request;
use App\ContaCorrenteMovimento as Movimento;

class ContaCorrenteMovimentoController extends Controller
{
    /**
     * Retorna todas as contas correntes existentes
     * 
     * @author Evandro Gardolin
     * @since 17-09-2019
     */
    public function find() 
    {
        return Movimento::all();
    }

    /**
     * Retorna um registro específico que foi consultado
     * 
     * @author Evandro Gardolin
     * @since 17-09-2019
     */
    public function findOne($id)
    {
        return Movimento::find($id);
    }
}

?>