<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Postagem;
use App\Http\Requests\PostagemRequest;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    private $postagem;

    public function __construct(Postagem $postagem)
    {
        $this->postagem = $postagem;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $postagensPaginated = Postagem::paginate($perPage);
        $postagensPaginated->appends([
            'per_page'=>$perPage
        ]);
        return response()->json($postagensPaginated);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostagemRequest $request)
    {
        try{
            return response()->json([
                "Message"=>"Postagem criada com sucesso!",
                "Postagem"=>$this->postagem->create($request->post())
            ]);
        }catch(Exception $error){
            return response()->json([
                "Erro"=>"Não foi possível criar uma nova Postagem!",
                "Exception"=>$error->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function show(Postagem $postagem)
    {
        return $postagem;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function update(PostagemRequest $request, Postagem $postagem)
    {
        try{
            $postagem->update($request->all());
            return response()->json([
                "Message"=>"Postagem atualizada com sucesso!",
                "Postagem"=>$postagem
            ]);
        }catch(Exception $error){
            return response()->json([
                "Erro"=>"Não foi possível atualizar a Postagem!",
                "Exception"=>$error->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postagem $postagem)
    {
        try{
            if($postagem->delete())
                return response()->json([
                    "Messge"=>"Postagem removida!!!",
                    "postagem"=>$postagem
                ]);
            throw new Exception("Erro ao deletar Postagem!");
        }catch(Exception $error){
            return response()->json([
                "Erro"=>"Não foi possível remover a Postagem!",
                "Exception"=>$error->getMessage()
            ]);
        }
    }
}
