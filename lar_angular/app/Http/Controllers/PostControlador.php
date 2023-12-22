<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $path = $request->file('arquivo')->store('imagens', 'public');
        $post->nome = $request->nome;
        $post->titulo = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->email = $request->email;
        $post->mensagem = $request->mensagem;
        $post->arquivo = $path;
        $post->likes = 0;
        $post->save();
        return response($post, 200);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like($id)
    {
        $post = Post::find($id);
        if(isset($post)){
            $post->likes ++;
            $post->save();
            return $post;
        }
        return response('Post não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::find($id);
       if(isset($post)){
           Storage::disk('public')->delete($post->arquivo);
           $post->delete();
           return 204;
       }
       return response('Post não encontrado', 404);
    }
}
