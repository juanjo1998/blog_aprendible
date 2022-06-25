<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {      
        $post = new Post();

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->excerpt = $request->excerpt;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->published_at = Carbon::parse($request->published_at);
        $post->save();

        $post->tags()->attach($request->tags);

        return back()->with('message','Post creado exitosamente');
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
    public function edit(Post $post)
    {
        $category = $post->category->pluck('name','id');
        $tags = $post->tags;

        return view('admin.posts.edit',compact('post','category','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {      
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->published_at = $request->published_at;
        $post->category_id = Category::find($cat = $request->category_id) ? $cat 
        : Category::create(['name' => $request->category_id])->id;
        $post->body = $request->body;

        if ($request->iframe) {
            $post->iframe = $request->iframe;
        }

        $post->save();

        /* tags */

        $tags = [];

        foreach($request->tags as $tag){
            $tags[] = Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        }

        $post->tags()->sync($tags);

        return redirect()->route('admin.posts.index')->with('message','El post se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }  

    public function files(Post $post, Request $request)
    {

        $request->validate([
           'file' => 'required|image|max:2048'
        ]);        
        
        if ($request->file('file')) {
            $url = Storage::put('posts',$request->file('file'));
        
            $post->images()->create([
                'url' => $url
            ]);
        }
    }
}
