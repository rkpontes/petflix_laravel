<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Category;
use App\Video;

class LoginController extends Controller
{
    
    public function verifyAuth(){

        //dd(Auth::user());

        if(Auth::check()){
            return redirect()->route('browser');
        }else{
            return view('login');
        }
    }

    public function browser(){
        
        $search = null;
        $featured = null;
        $recently = null;
        $featureds = [];
        $videos = [];
        $videos_search = [];

        !empty($_GET['search']) ? $search = $_GET['search'] : null;
        !empty($_GET['featured']) ? $featured = $_GET['featured'] : null;
        !empty($_GET['recently']) ? $recently = $_GET['recently'] : null;
        
        $categories = Category::all();

        if(!empty($search)){
            $category = Category::where('name', $search)->first();
            $videos_search = Video::where('category_id', $category->id ?? 0)->orWhere('title', 'like', '%'.$search.'%')->get();
        }else if(!empty($featured)){
            $videos_search = Video::where('featured', 1)->get();
        }else if(!empty($recently)){
            $videos_search = Video::orderBy('created_at', 'desc')->take(10)->get();
        }else{
            $featureds = Video::where('featured', 1)->get();
            $videos = Video::where('featured', 0)->get();
        }

        return view('index', compact('categories', 'featureds', 'videos', 'search', 'featured', 'videos_search'));
    }

    public function login(Request $request){
        //dd($request);

        $credentials = $request->only('email', 'password');

        !empty($request->remember) ? $lembrar = true : $lembrar = false;

        if (Auth::attempt($credentials, $lembrar)) {
            return redirect()->route('index');
        }
    }

    public function register(Request $request){

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->activated = 1;
        $user->created_at = now();
        $saved = $user->save();

        if($saved){
            //
        }

        return redirect()->route('index');

    }


}
