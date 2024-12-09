<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    //


    public function createUsers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|digits:11|unique:users,cpf', // Validação customizada
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'position' => 'required|integer|max:1',
            'cep' => 'required|string|digits:8',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        // Consultar endereço via API
    
    
        $users = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'position' => $request->position,
            'dob' => $request->dob,
            'cep' => $request->cep,
            'address' => $request->address,
            'complements' => $request->complements,
            'state' => $request->state,
            'city' => $request->city,
            'country' => $request->country,
            "phone"  => $request->phone,
            'supervisor_id' => 1,
        ]);
    
        return response()->json(['message' => 'Usuário criado com sucesso.', 'data' => $users], 201);
    }

    public function usersList()
    {
        $users = User::paginate(100); // Paginação de 10 por página
        return response()->json($users, 200);
    }

    public function userDetails(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'Funcionário não encontrado.'], 404);
        }
        return response()->json($user, 200);
    }

    public function usersEdit(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'Funcionário não encontrado.'], 404);
        }

        // Atualizar os campos fornecidos
        $user->update($request->all());

        return response()->json(['message' => 'Funcionário atualizado com sucesso.', 'data' => $user], 200);
    }

    public function usersDelete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'Funcionário não encontrado.'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'Funcionário deletado com sucesso.'], 200);
    }

    

}


