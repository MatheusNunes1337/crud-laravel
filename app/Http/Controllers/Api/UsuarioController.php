<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    private $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $usuariosPaginated = Usuario::paginate($perPage);
        $usuariosPaginated->appends([
            'per_page'=>$perPage
        ]);
        return response()->json($usuariosPaginated);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        try{
            return response()->json([
                "Message"=>"Usuário criado com sucesso!",
                "Usuario"=>$this->usuario->create($request->post())
            ]);
        }catch(Exception $error){
            return response()->json([
                "Erro"=>"Não foi possível criar novo Usuário!",
                "Exception"=>$error->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        try{
            $usuario->update($request->all());
            return response()->json([
                "Message"=>"Usuário atualizado com sucesso!",
                "Usuário"=>$usuario
            ]);
        }catch(Exception $error){
            return response()->json([
                "Erro"=>"Não foi possível atualizar o Usuário!",
                "Exception"=>$error->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        try{
            if($usuario->delete())
                return response()->json([
                    "Messge"=>"Usuário removido !",
                    "Usuario"=>$usuario
                ]);
            throw new Exception("Erro ao deletar Usuario!");
        }catch(Exception $error){
            return response()->json([
                "Erro"=>"Não foi possível remover o Usuario!",
                "Exception"=>$error->getMessage()
            ]);
        }
    }

    public function listPostagens(Usuario $usuario)
    {
        return response()->json($usuario->load('postagens'));
    }
}
