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
Route::get("conta-corrente/{id}", "ContaCorrenteController@findOne");
Route::post("conta-corrente", "ContaCorrenteController@create");
Route::put("conta-corrente/{id}", "ContaCorrenteController@update");
Route::delete("conta-corrente/{id}", "ContaCorrenteController@delete");
Route::put("conta-corrente/depositar/{id}", "ContaCorrenteController@deposit");
Route::put("conta-corrente/sacar/{id}", "ContaCorrenteController@withdraw");
Route::post("conta-corrente/transferir", "ContaCorrenteController@transfer");

Route::get("movimento", "ContaCorrenteMovimentoController@find");
Route::get("movimento/{id}", "ContaCorrenteMovimentoController@findOne");

