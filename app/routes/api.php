<?php

use Illuminate\Http\Request;

use App\Http\ContaCorrenteController;
use App\Http\ContaCorrenteMovimentoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("conta-corrente", "ContaCorrenteController@find");
Route::get("conta-corrente/{conta-corrente}", "ContaCorrenteController@findOne");
Route::post("conta-corrente", "ContaCorrenteController@create");
Route::put("conta-corrente/{conta-corrente}", "ContaCorrenteController@update");
Route::delete("conta-corrente/{conta-corrente}", "ContaCorrenteController@delete");
Route::post("conta-corrente/depositar", "ContaCorrenteController@deposit");
Route::post("conta-corrente/sacar", "ContaCorrenteController@withdraw");
Route::post("conta-corrente/transferir", "ContaCorrenteController@transfer");

Route::get("movimento", "ContaCorrenteMovimentoController@find");
Route::get("movimento/{movimento}", "ContaCorrenteMovimentoController@findOne");

