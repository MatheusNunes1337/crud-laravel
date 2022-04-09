<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        try{
            $request->validate([
                'email'=>'required | email | exists:users',
                'password'=>'required | string'
            ]);

            $user = User::where('email', $request->email)->first();
            if(!$user || !Hash::check($request->password, $user->password))
                throw new Exception('A senha está incorreta. Tente novamente!');

            $ability = $user->is_admin?['is-admin']:[];
            $response = $user->createToken($request->email, $ability)->plainTextToken;
            return response()->json(['token'=>$response]);
        }catch(Exception $error){
            return response()->json([
                'erro'=>$error->getMessage()
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        $auth_user = $request->user();
        if($request->input('all')){
            if($auth_user->tokens()->delete())
                return ['logout'=>'Usuário desconectado de todos os dispositivos'];
        }else{
            if($auth_user->currentAccesstoken()->delete())
                return ['logout'=>'Usuário desconectado'];
        }
        return response()->json(['logout'=>'Houve um erro ao desconectar Usuário'], 500);
    }
}
