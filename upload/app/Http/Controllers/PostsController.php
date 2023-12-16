<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        try {
            $post = new Post();
            $path = $request->file('arquivo')->store('imagens', 'public');
            $post->mensagem = $request->mensagem;
            $post->email = $request->email;
            $post->arquivo = $path;
            $post->save();
            return redirect('/')->with('success', 'Arquivo salvo com sucesso');
        } catch (\Exception $e) {
            return redirect()->to('/')->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        if (isset($post)) {
            $path = $post->arquivo;
            Storage::disk('public')->delete($path);
            $post->delete();
        }
        return redirect()->to('/');
    }

    public function download($id){
        $post = Post::find($id);
        if(isset($post)){
            $path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($post->arquivo);
            return response()->download($path);
        }

        return redirect('/');
    }
}
