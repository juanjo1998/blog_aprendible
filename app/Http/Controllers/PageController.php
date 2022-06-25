<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $posts = Post::published()->paginate(3);

        return view('welcome',compact('posts'));
    }
}
