<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $model;

    public function __contructor(Post $post)
    {
        $this->model = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('layouts.posts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        if ($request->hasfile('image')) {
            $image = $request->image;
            $name = date('Y/m/d-h:i:s-') . str_replace(' ', '_', $image->getClientOriginalName());
            $path = 'images/' . date('Y/m');
            $image->move(public_path($path), $name);
        } else {
            $name = 'unknown.jpg';
        }
        $request->request->add(['user_id' => $request->user()->id]); //add request
        $post = [
            'title' => $request->title,
            'body' => $request->body,
            'image' => $name,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ];
        Post::create($post);
        return redirect()->back()->with('success', "Post $request->title success!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('layouts.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, Post $post)
    {
        return view('layouts.posts.edit', compact('post'))->with('success', "Post $post->title Edit!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        foreach ($request->all() as $key => $index) {
            if (!$request->image) {
                $request->validate([$key => 'required']);
            }
        }
        if ($request->hasfile('image')) {
            $image = $request->image;
            $name_image = date('Y/m/d-h:i:s-') . str_replace(' ', '_', $image->getClientOriginalName());
            $path = 'images/' . date('Y/m');
            $image->move(public_path($path), $name_image);
            $posts = [
                'title' => $request->title,
                'body' => $request->body,
                'image' => $name_image,
                'category_id' => $request->category_id,
            ];
        }else{
            $posts = [
                'title' => $request->title,
                'body' => $request->body,
                'category_id' => $request->category_id,
            ];
        }
        $post->update($posts);
        return redirect()->back();
    }

    public function category($id)
    {
        $postsc = Post::where('category_id', $id)->paginate(3);
        return view('layouts.posts.category', compact('postsc'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success', "Post $post->title Deleted!");
    }
}
