<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::with(['category','user'])->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        if ($request->user_id!=0 || $request->user_id!=null) {
            if ($request->category_id!=0 || $request->category_id!=null) {
                $request->request->add(['user_id' => $request->user_id,'category_id' => $request->category_id]); //add request
                $post = Post::create($request->all());
                return $post;
            } else {
                return [
                    'code' => 404,
                    'user' => "Craete by ID ".$request->user_id,
                    'categoty' => "Not found"
                ];
            }
        } else {
            return [
                'code'=>404,
                'user'=>'Not found'
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->category;
        $post->user;
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        if ($post) {
            return [
                'code'=>203,
                'message'=>"Post ID $post->id is up to date!"
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        if ($post) {
            return [
                'code'=>204,
                'message'=>"Post ID $post->id was deleted from system!",
            ];
        }
    }
}
