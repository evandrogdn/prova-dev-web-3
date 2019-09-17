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
    public function find() 
    {
        return CC::all();
    }

    /**
     * Retorna um registro específico que foi consultado
     * 
     * @author Evandro Gardolin
     * @since 17-09-2019
     */
    public function findOne(CC $contaCorrente)
    {
        return $contaCorrente;
    }

    /**
     * Cadastra uma conta corrente apartir de dados fornecidos
     * 
     * @author Evandro Gardolin
     * @since 17-09-2019
     */
    public function create(Request $request)
    {
        // Realiza cadastro de conta corrente
        $contaCorrente = CC::create($request->all);
        // Retorno "visual"
        return response()->json($contaCorrente, 201);
    }

    /**
     * Atualiza dados de uma conta corrente
     * 
     * @author Evandro Gardolin
     * @since 17-09-2019
     */
    public function update(Request $request , $id)
    {
        // Busca por conta corrente com o ID fornecido
        $contaCorrente = CC::findOrFail($id);
        // Atualiza o registro se encontrado
        $contaCorrente->update($request->all());
        // Retorno "visual"
        return response()->json($contaCorrente, 200);
    }
}

?>