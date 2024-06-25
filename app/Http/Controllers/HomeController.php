<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
    //  * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::id()){
           $usertype=Auth()->user()->usertype;

           if($usertype=='user'){
            $data = Post::get();
            return view('home.homepage',compact('data'));
           }
           elseif($usertype=='admin'){
            return view('admin.adminhome');
           }else{
            return redirect()->back();
           }
        }
    }

    public function homepage(){
        $data = Post::get();
        return view('home.homepage',compact('data'));
    }

    public function post_details($id){
        $post = Post::find($id);
        return view('home.post_details',compact('post'));
     
    }
    public function create_post(){
        return view('home.create_post');
     
    }

    public function user_post(Request $request){
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

    public function my_post(){
        $user = Auth::user();
        $user_id = $user->id;
        $datas = Post::where('user_id','=',$user_id)->get();
        $year='2024';
        $month="06";
        $day="22";
        $today = Carbon::createMidnightDate($year, $month,$day);
        return view('home.my_post',compact('datas','today'));
      
    }

    public function my_post_del($id){
      $data = Post::find($id);
      $data->delete();
      return redirect()->back()->with('message','Post Deleted Successfully');
    }

    public function post_update_page($id){
        $data = Post::find($id);
        return view('home.post_update_page',compact('data'));

    }

    public function update_post_page(Request $request, $id){
        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        //for image upload
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('postimage',$image_name);
            $data->image = $image_name;
            }
            $data->save();
            return redirect()->back()->with('message','Post Updated Successfully');
            
    }
    //for about_page
    public function about_page(){
        return view('home.about_page');
        }

    public static function test(){
        $a = 10;
        $b = 20;
        $c = $a + $b;
        return $c;
    }  
    
    public function testing(){
        $a = 10;
        $b = 20;
        $c = $a + $b;
        return $c;
    }

}
