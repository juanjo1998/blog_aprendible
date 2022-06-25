<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Jorenvh\Share\Share;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $share = new Share();

        $socialShare = $share->page('http://blog_aprendible.test/posts/post-de-prueba',$post->title.':')
        ->facebook()
        ->twitter()
        ->whatsapp();

        return view('posts.show',compact('post','socialShare'));
    }
}
