<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\amenities;
use App\Condo;
use App\Types;
use App\User;
use Auth;


class PostController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$posts = Post::all();
        //$post = Post::where('title', 'Post Two')->get();
        //$posts = Post::orderby('title','desc')->take(1)->get();
        $posts = Post::orderby('created_at','desc')->paginate(10);

        
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->types['id'] == 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        //
        $amenities = amenities::pluck('name','id')->all();        

        return view('post.create')->with('amenities', $amenities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->types['id'] == 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
    
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:10000',
            'inclusion' => 'required',
            'unit_level' => 'required',
            'unit_type' => 'required',
            'city' => 'required',
            'price' => 'required'
        ]);
    
        // Handle File Upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get Just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else{
            $fileNameToStore = 'noimage.jpg';
        }
        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        //$post->amenities = $request->input('amenities');
        $post->inclusion = $request->input('inclusion');
        $post->unit_level = $request->input('unit_level');
        $post->unit_type = $request->input('unit_type');
        $post->city = $request->input('city');
        $post->price = $request->input('price');
        $post->user_id = auth()->user()->id;
        $post->condos_id = Auth::user()->condos['id'];
        $post->cover_image = $fileNameToStore;
        $post->save();
        $post=Post::orderby('created_at','desc')->first();
            $amenities = $request->input('amenities');
                foreach($amenities as $amenity){
                    $post->amenities()->attach($amenity);
                }
    
    return redirect('\post')->with('success','Post Created');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->types['id'] == 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $post = Post::find($id);
        //Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error','Unauthorized Page');
        }
        return view('post.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->types['id'] == 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get Just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        //Edit Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('\post')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->types['id'] == 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $post = Post::find($id);
         //Check for correct user
         if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error','Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/cover_image/'.$post->cover_image);


        }
        $post->delete();
        return redirect('\post')->with('success','Post Deleted');

    }
    public function search(Request $request){
        $search=$request->input('search_term');
        $output = Post::search($search)->paginate(10);
        return view('post.index')->with('posts', $output);
    }
    
}
