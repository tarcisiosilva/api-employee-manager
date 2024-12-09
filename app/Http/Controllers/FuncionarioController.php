<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Validator;

class FuncionarioController extends Controller
{
    public function listarFuncionarios()
    {
        $funcionarios = Funcionario::paginate(10); // Paginação de 10 por página
        return response()->json($funcionarios, 200);
    }

    public function editarFuncionario(Request $request, $id)
    {
        $funcionario = Funcionario::find($id);
        if (!$funcionario) {
            return response()->json(['error' => 'Funcionário não encontrado.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nome' => 'string|max:255',
            'cpf' => 'string|max:14|unique:funcionarios,cpf,' . $funcionario->id,
            'email' => 'string|email|max:255|unique:funcionarios,email,' . $funcionario->id,
            'cargo' => 'string|max:255',
            'data_nascimento' => 'date',
            'cep' => 'string|max:9',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Atualizar os campos fornecidos
        $funcionario->update($request->all());

        if ($request->cep) {
            $endereco = $this->buscarEndereco($request->cep);
            if ($endereco) {
                $funcionario->endereco_completo = $endereco;
                $funcionario->save();
            }
        }

        return response()->json(['message' => 'Funcionário atualizado com sucesso.', 'data' => $funcionario], 200);
    }

    public function deletarFuncionario($id)
    {
        $funcionario = Funcionario::find($id);
        if (!$funcionario) {
            return response()->json(['error' => 'Funcionário não encontrado.'], 404);
        }

        $funcionario->delete();
        return response()->json(['message' => 'Funcionário deletado com sucesso.'], 200);
    }


}
