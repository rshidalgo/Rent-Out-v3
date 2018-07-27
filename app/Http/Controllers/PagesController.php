<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Condo;
use App\User;



class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To Laravel!';
        //return view ('pages.index', compact('title'));
        $posts = Post::where('status', 'LIKE', 1)->orderby('created_at','desc')->paginate(3);

        return view ('pages.index')->with('posts', $posts);
    }

    public function about(){
        $title = 'About Us';
        return view ('pages.about')->with('title', $title);
    }
    
    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view ('pages.services')->with($data);
    }
    public function condo(){
        $condos_active = Condo::where('status', 'LIKE', 1)->get();
        $condos_inactive = Condo::where('status', 'LIKE', 0)->get();

        return view ('manage.condo')->with('condos_active',$condos_active)->with('condos_inactive',$condos_inactive);
    }
    public function user(){
        $users = User::where('types_id', '=', 2)->get();
        return view ('manage.user')->with('users',$users);
    }

}
