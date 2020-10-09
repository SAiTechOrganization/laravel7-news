<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|string|max:30',
                'body'  => 'required|string'
            ],
            [
                'title.required' => 'タイトルは必須です。',
                'title.string'   => 'タイトルには文字列を入力してください。',
                'title.max'      => 'タイトルは30文字以下です。',
                'body.required'  => '記事は必須です。',
                'body.string'    => '記事には文字列を入力してください。',
            ]
        );

        Post::create([
            'title' => $request->title,
            'body'  => $request->body,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->orderBy('created_at', 'desc')->get();

        return view('posts.show', [
            'post'     => $post,
            'comments' => $comments,
        ]);
    }
}
