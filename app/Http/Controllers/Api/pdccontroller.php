<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class pdccontroller extends Controller
{
    public function status() {
        return ['status' => 'ok'];
    }

    public function add(Request $request) {

        try {
            $produto = new Produto();

            $produto->nome = $request->nome;
            $produto->descricao = $request->descricao;
            $produto->valor= $request->valor;

            $produto->save();

            return ['retorno'=>'ok'];

        } catch(\Exception $erro) {

            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function list() {

        $produto = Produto::all('id', 'nome');

        return $produto;
    }

    public function select($id) {

        $contato = Produto::find($id);

        return $contato;
    }

    public function update(Request $request, $id) {

        try {

            $produto = Produto::find($id);

            $produto->nome = $request->nome;
            $produto->descricao = $request->descricao;
            $produto->valor = $request->valor;

            $produto->save();

            return ['retorno'=>'ok', 'data'=>$request->all()];

        } catch(\Exception $erro) {

            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }

    public function delete($id) {

        try {

            $produto = Produto::find($id);

            $produto->delete();

            return ['retorno'=>'ok'];

        } catch(\Exception $erro) {

            return ['retorno'=>'erro', 'details'=>$erro];
        }
    }
}
