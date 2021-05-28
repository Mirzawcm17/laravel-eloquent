<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        exit(5);
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();

        // $posts = Post::orderBy('title', 'desc')->get();
        // return Post::where('title', 'Post Two')->get();

        $posts = Post::where('title', 'LIKE', '%'.$request->input('search').'%')->orderBy('created_at', 'desc')->paginate(10);
        return view('pages.search')->with('posts', $posts);
    }
}
