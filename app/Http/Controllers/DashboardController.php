<?php

namespace App\Http\Controllers;
use App\User;
use App\Condo;

use Illuminate\Http\Request;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $condos = Condo::get();
        // Customer
        if(auth()->user()->types['id'] == 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        // Admin
        elseif(auth()->user()->types['id'] == 3){
            return view('dashboard')->with('condos', $condos);
        }
        // Property Specialist
        else{
            return view('dashboard')->with('posts', $user->posts);
        }
       
    function search(Request $request){
            $search=$request->input('search_term');
            $output = Post::search($search)->paginate(10);
            return view('post.index')->with('posts', $output);
    }
    }
}
