<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        $users = User::all();
        return view('admin.post.index',compact('posts','categories','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('admin.post.create',compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {   
        $posts = Post::create($request->all());
        $fileName = time().'.'.$request->photo->extension();
        $upload = $request->photo->move(public_path('images/'),$fileName);
        if($upload){
            $posts->photo = "/images/".$fileName;
        }
        $posts->save();
        return redirect()->route('backend.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $post = Post::find($id);
            $categories = Category::all();
            $users = User::all();
            return view('admin.post.edit',compact('post','categories','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        if($request->hasFile('new_image')){
            $fileName = time().'.'.$request->new_image->extension();

            $upload = $request->new_image->move(public_path('images/'), $fileName);

            if($upload){
                $post->photo = "/images/".$fileName;
            }
        }else{
            $post->photo = $request->old_image;
        }
        $post->save();
        return redirect()->route('backend.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Post::find($id);
        $item->delete();
        return redirect()->route('backend.posts.index');
    }
}
