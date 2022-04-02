<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Postagem;
use Illuminate\Http\Request;

class PostagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function show(Postagem $postagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postagem $postagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postagem $postagem)
    {
        //
    }
}
