<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input as Input;
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

    /**
     * Remove conta corrente a partir de um ID fornecido
     * 
     * @author Evandro Gardolin
     * @since 17-09-2019
     */
    public function delete(Request $request, $id)
    {
        // Busca por conta corrente com o ID fornecido
        $contaCorrente = CC::findOrFail($id);
        // Deleta a conta
        $contaCorrente->delete();
        // Retorno "visual"
        return response()->json(null, 204);
    }

    /**
     * Realiza deposito na conta corrente existente
     * 
     * @author Evandro Gardolin
     * @since 17-09-2019
     */
    public function deposit(Request $request, $id)
    {
        // Busca pela conta corrente na qual será realizado o deposito
        $contaCorrente = CC::findOrFail($id);
        // Faz "backup" da conta
        $contaCorrenteNova = $contaCorrente;
        // Atualiza o valor de saldo da conta corrente
        $contaCorrenteNova->conta_corrente_saldo += $request->input("valor");
        // Atualiza o objeto Conta Corrente
        $contaCorrente->update($contaCorrenteNova);
        // @TODO - Implementar registro de movimentação da conta corrente

        // Retorno "visual"
        return response()->json($contaCorrenteNova, 200);
    }

    /**
     * Realiza saque na conta corrente existente
     * 
     * @author Evandro Gardolin
     * @since 17-09-2019
     */
    public function withdraw(Request $request, $id)
    {
        // Busca a conta corrente na qual será realizado o saque
        $contaCorrente = CC::findOrFail($id);
        // Verifica se existe saldo para realizar o saque
        if ($contaCorrente->conta_corrente_saldo < $request->input('valor')){
            return response()->json($contaCorrente, 304);
        }
        // Faz backup da conta corrente
        $contaCorrenteNova = $contaCorrente;
        // Atualiza o valor de saldo
        $contaCorrenteNova->conta_corrente_saldo -= $request->input("valor");
        // Atualiza os dados da conta corrente
        $contaCorrente->update($contaCorrenteNova);
        // @TODO = Implementar registro de movimento de conta corrente

        // Retorno visual
        return response()->json($contaCorrenteNova, 200);
    }

    /**
     * Método que realiza transferência entre duas contas
     * 
     * @author Evandro Gardolin
     * @since 17-09-2019
     */
    public function transfer(Request $request)
    {
        // Busca conta de origem
        $contaCorrenteOrigem = CC::findOrFail($request->input("conta_origem_id"));
        // Valida saldo da conta de origem para realizar a transferencia
        if ($contaCorrenteOrigem->conta_corrente_saldo < $request->input('valor')){
            return response()->json(null, 304);
        }
        // Busca conta de destino
        $contaCorrenteDestino = CC::findOrFail($request->input("conta_destino_id"));

        // @TODO - Implementar movimento de caixa...

        // Faz "backup" e atualiza a conta de destino
        $contaDestinoAux = $contaCorreteDestino;
        $contaDestinoAux->conta_corrente_saldo += $request->input("valor");
        $contaCorrenteDestino->update($contaDestinoAux);

        // Faz "backup" e atualiza a conta de origem
        $contaOrigemAux = $contaCorrenteOrigem;
        $contaOrigemAux->conta_corrente_saldo -= $request->input("valor");
        $contaCorrenteOrigem->update($contaOrigemAux);

        return response()->json(null, 200);
    }
}

?>