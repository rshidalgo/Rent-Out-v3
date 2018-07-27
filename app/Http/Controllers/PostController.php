<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\amenities;
use App\Condo;
use App\Types;
use App\User;
use App\image;
use App\Report;
use App\Mail\BillingS;
use Mail;
use Carbon\Carbon;



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
        $this->middleware('auth', ['except' => ['index', 'show','search']]);
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
            'inclusion' => 'required',
            'unit_level' => 'required',
            'unit_type' => 'required',
            'price' => 'required|numeric',
            'cover_image' => 'required'
        ]);

        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        //$post->amenities = $request->input('amenities');
        $post->inclusion = $request->input('inclusion');
        $post->unit_level = $request->input('unit_level');
        $post->unit_type = $request->input('unit_type');
        $post->price = $request->input('price');
        $post->user_id = auth()->user()->id;
        $post->condos_id = auth()->user()->condos_id;;
        $post->save();

        // Handle File Upload
        $images = $request->file('cover_image');
        $post=Post::orderby('created_at','desc')->first();
        if($request->hasFile('cover_image')){
            foreach($images as $image){
                Storage::put('public/'.$image->getClientOriginalName(), file_get_contents($image));
                echo $image->getClientOriginalName();
                $picture = new image;
                $picture->cover_image = $image->getClientOriginalName();
                $picture->post_id = $post->id;
                $picture->save();
            }
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
        $images = $post->images()->get();
        $condo = Condo::find($post->condos['id']);
        $amenities = $condo->amenities()->get();
        return view('post.show')->with('post',$post)->with('images',$images)->with('amenities',$amenities);
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
        // $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required'
        // ]);
        // Handle File Upload
        // if($request->hasFile('cover_image')){
        //     //Get filename with the extension
        //     $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //     //Get Just filename
        //     $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //     //Get just ext
        //     $extension = $request->file('cover_image')->getClientOriginalExtension();
        //     //Filename to store
        //     $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //     //Upload Image
        //     $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        // }

        //Edit Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            foreach($images as $image){
                Storage::put('public/'.$image->getClientOriginalName(), file_get_contents($image));
                echo $image->getClientOriginalName();
                $picture = new image;
                $picture->cover_image = $image->getClientOriginalName();
                $picture->post_id = $post->id;
                $picture->save();
            }
        }
        $post->inclusion = $request->input('inclusion');
        $post->unit_level = $request->input('unit_level');
        $post->unit_type = $request->input('unit_type');
        $post->price = $request->input('price');
        $post->user_id = auth()->user()->id;
        $post->condos_id = Auth::user()->condos['id'];
        $post->save();
        return redirect('\post')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

    }

    public function reserve(Request $request, $id){
        $post = Post::find($id);

        $this->validate($request, [
            'customer' => 'required',
            'checkbox' => 'required',
        ]);
        if(auth()->user()->types['id'] == 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        
        //Check for correct user
         if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error','Unauthorized Page');
        }

        if($request->input('checkbox') == true){
            $post->status = 0;
            $post->save();
            $condo = Condo::find($post->condos['id']);
            $condo->increment('total_reserves');
            $condo->increment('reserved');
            $date_checker = Carbon::now();
                if($date_checker->day == 15){
                    //Send Billing to Property Specialist
                    $condo->reserved = 0;
                    $condo->status = 0;
                    $condo->save();
                    $pspecialist = User::find($condo->user_id);

                    $data = array(
                        'propertyS' => $pspecialist->name,
                        'propertyE' => $pspecialist->email,
                    );
                    
                    Mail::to(auth()->user()->email)->send(new BillingS($data));

                }
                $condo->save();
                $post->status = 0;
                $report = new Report;
                $report->post_name = $post->title;
                $report->post_condo = auth()->user()->condos['name'];
                $report->user_id = $post->user_id;
                $report->user_name = auth()->user()->name;
                $report->post_value = $post->price;
                $report->reserved_at = $post->created_at;
                $report->customer = $request->input('customer');
                $report->save();
                return redirect('\dashboard')->with('success','Transaction Complete');
        }
        else
        return redirect('\dashboard')->with('error','Please Check the Checkbox');

        }
    public function reactivate(Request $request, $id){
        $post = Post::find($id);
        $this->validate($request, [
            'checkbox' => 'required',
        ]);
        if(auth()->user()->types['id'] == 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        
        //Check for correct user
         if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error','Unauthorized Page');
         }
        $post->status = 1;
        $post->save();
        return redirect('\dashboard')->with('success','Transaction Complete');

    }

    public function remove(Request $request, $id){
        $post = Post::find($id);
        $this->validate($request, [
            'remove' => 'required',
        ]);
        if(auth()->user()->types['id'] == 1){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        
        //Check for correct user
         if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error','Unauthorized Page');
        }
        $post->status = 2;
        $post->save();
        return redirect('\dashboard')->with('success','Transaction Complete');

    }
    public function search(Request $request){
        $search=$request->input('search_term');
        $output = Post::search($search)->paginate(10);
        return view('post.index')->with('posts', $output);
    }
}
