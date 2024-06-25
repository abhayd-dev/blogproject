<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //for adminhome
    public function index()
    {
        $posts = Post::all();
        return view('admin.adminhome',compact('posts'));
        }
    public function post_page(){
        return view('admin.post_page');
    }
    public function add_post(Request $request){

        $user =Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;
       $post = new Post();
       $post->title = $request->title;
       $post->description = $request->description;
       //for status
       $post->post_status = 'active';
     
       //for image upload
       $image = $request->file('image');
       $image_name = time().'.'.$image->getClientOriginalExtension();
       $image->move('postimage',$image_name);
       $post->image = $image_name;
         //for user_type
         $post->user_id = $user_id;
         $post->name = $name;
         $post->usertype = $usertype;
       $post->save();

       return redirect()->back()->with('message','Post Added Successfully');

    }

    public function show_post(){
        $posts = Post::all();
        return view('admin.show_post',compact('posts'));
    }
    public function delete_post($id){
        
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post Deleted Successfully');
    }

    public function edit_post($id){
        $post = Post::find($id);
        return view('admin.edit_post',compact('post'));
    }

    public function update_post(Request $request,$id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
    
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('postimage',$image_name);
            $post->image = $image_name;
            }
            $post->save();
            return redirect()->back()->with('message','Post Updated Successfully');

    }
    
}
