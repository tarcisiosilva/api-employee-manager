<?php

namespace App\Http\Controllers;
use App\Models\Point;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class PontoController extends Controller
{
    public function pointRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|int|max:10'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $point = Point::create([
            'user_id' => $request->user_id,
            'registered_at' => date('Y-m-d H:i:s')
            
        ]);
    
        return response()->json(['message' => 'Usuário criado com sucesso.', 'data' => $point], 201);
    }
}
