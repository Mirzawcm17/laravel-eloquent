<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchterm = $request->input('search');

        $posts = Post::where('title', 'LIKE', '%'.$searchterm.'%')->orderBy('created_at', 'desc')->paginate(10);
        return view('pages.search')->with('posts', $posts)->with('searchterm', $searchterm);
    }
}
