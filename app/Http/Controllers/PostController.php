<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(1);
        return view('pages.home', compact('posts'));
    }

    public function addPost(){
        return view('pages.add-post');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'title' =>'required|unique:post|max:255',
            'content' =>'required',
            'image'=>'mimes:jpeg,jpg,png',
        ]);

        if(request()->hasFile('image')){
            $path = $request->file('image')->store('public/images'); //Storing in folder
            $fileName = str_replace('public/', '', $path);
        }

        Post::create([
            'title' =>request('title'),
            'content' =>request('content'),
            'image' =>$fileName, // path saved in database
        ]);
        return redirect('/');

    }
    public function showPost(Post $post) {
        return view('pages.show-post', compact('post'));
    }

    public function editPost(Post $post) {
        return view('pages.edit-post', compact('post'));
    }

    public function storeUpdate(Post $post, Request $request) {
        if($post->image){
            File::delete(storage_path('app/public/'.$post->image));
        }
        if(request()->hasFile('image')){
            $path = $request->file('image')->store('public/images'); //Storing in folder
            $fileName = str_replace('public/', '', $path);
            Post::where('id', $post->id)->update(['image'=>$fileName]);
        }
        Post::where('id', $post->id)->update($request->only(['title', 'content']));
        return redirect('/post/'.$post->id);
    }

    public function deletePost(Post $post){

        $post->delete();

        return redirect('/');
    }
}
