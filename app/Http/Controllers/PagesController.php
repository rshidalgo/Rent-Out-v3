<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To Laravel!';
        //return view ('pages.index', compact('title'));
        $posts = Post::orderby('created_at','desc')->paginate(10);

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

}
