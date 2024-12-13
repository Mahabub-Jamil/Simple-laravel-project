<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function create() {
        return view('create');
    }

    public function userfilestore(Request $request) {

        $validated = $request->validate([
            'name' => 'required|unique:posts|max:255',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg',
        ]);
        //upload image
        $imageName = null;
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
        }
        


        //add new post
        $post = new Post;

        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;
        $post->save();

        return redirect()->route('home')->with('success','Post created successfully');
    }

    public function editdata($id) {
        $post = Post::findOrFail($id);
        return view('edit',['editpost' => $post]);
    }
        
    public function updatedata($id, Request $request){
        
        $validated = $request->validate([
            'name' => 'required|unique:posts|max:255',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg',
        ]);

        
        
        //update post
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;

        //upload image
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $post->image = $imageName;
        }
        
        $post->save();

        return redirect()->route('home')->with('success','Post updated successfully');
    }

    public function deletedata($id){
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('home')->with('success','Post deleted successfully');
    }
}
