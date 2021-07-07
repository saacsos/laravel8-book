<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller 
{
    public function index()
    {
        $posts = [
            (object) [
                'id' => 1,
                'title' => 'First Post',
                'detail' => 'First post detail',
                'views' => 350
            ],
            (object) [
                'id' => 2,
                'title' => 'Second Post',
                'detail' => 'Second post detail',
                'views' => 1637
            ]
        ];
        return view('posts.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        return 'Post ID: ' . $id;
    }
}