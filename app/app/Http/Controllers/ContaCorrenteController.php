<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;
use App\ContaCorrente as CC;

class ContaCorrenteController extends Controller
{
    /**
     * Retorna todas as contas correntes existentes
     * 
     * @author Evandro Gardolin
     * @since 17-09-2019
     */
    public function index() 
    {
        return CC::all();
    }
}

?>