<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupoRequest;
use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    private $grupo;

    public function __construct(Grupo $grupo)
    {
        $this->grupo = $grupo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $gruposPaginated = Grupo::paginate($perPage);
        $gruposPaginated->appends([
            'per_page'=>$perPage
        ]);
        return response()->json($gruposPaginated);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoRequest $request)
    {
        try{
            return response()->json([
                "Message"=>"Grupo criado com sucesso!",
                "Grupo"=>$this->grupo->create($request->post())
            ]);
        }catch(Exception $error){
            return response()->json([
                "Erro"=>"Não foi possível criar novo Grupo!",
                "Exception"=>$error->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        return $grupo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(GrupoRequest $request, Grupo $grupo)
    {
        try{
            $grupo->update($request->all());
            return response()->json([
                "Message"=>"Grupo atualizado com sucesso!",
                "Grupo"=>$grupo
            ]);
        }catch(Exception $error){
            return response()->json([
                "Erro"=>"Não foi possível atualizar o Grupo!",
                "Exception"=>$error->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        try{
            if($grupo->delete())
                return response()->json([
                    "Messge"=>"Grupo removido !",
                    "grupo"=>$grupo
                ]);
            throw new Exception("Erro ao deletar Usuario!");
        }catch(Exception $error){
            return response()->json([
                "Erro"=>"Não foi possível remover o Grupo!",
                "Exception"=>$error->getMessage()
            ]);
        }
    }

    public function listPostagens(Grupo $grupo)
    {
        return response()->json($grupo->load('postagems'));
    }
}
