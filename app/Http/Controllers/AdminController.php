<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Condo;
use App\amenities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->types['id'] != 3){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->types['id'] != 3){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->types['id'] != 3){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $this->validate($request, [
            'developers' => 'required',
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'license' => 'required',
            'tin' => 'required',
            'psname' => 'required',
            'email' => 'required',
            'sex' => 'required',
            'mobnum' => 'required',
            'telnum' => 'required'
        ]);

        $condo = new Condo;
        $condo->developer_id = $request->input('developers');
        $condo->name = $request->input('name');
        $condo->address = $request->input('address');
        $condo->description = $request->input('description');
        $condo->license_no = $request->input('license');
        $condo->tin = $request->input('tin');
        $condo->save();
    
        User::create([
            'name' => $request->input('psname'),
            'email' => $request->input('email'),
            'gender' => $request->input('sex'),
            'date_of_birth' => $request->input('date_of_birth'),
            'phone_num' => $request->input('mobnum'),
            'telephone_num' => $request->input('telnum'),
            'password' => Hash::make('rentoutpassword123'),
        ]);
        
        $type = User::orderby('created_at','desc')->first();
        $type->types_id = 2;

        $condo = Condo::orderby('created_at','desc')->first();
        $type->condos_id = $condo->id;
        $type->save();

        $amenity_input = $request->input('amenities');

        foreach($amenity_input as $amenity){
            $products = amenities::where('name', 'LIKE', '%'.$amenity.'%')->get();
            if(count($products)){
                echo "it exists";
            }
            else{
                $amenities = new amenities;
                $amenities->name = $amenity;
                $amenities->save();
            }
            $products = amenities::where('name', 'LIKE', '%'.$amenity.'%')->first();
            $amenityid = $products->id;
            $condo->amenities()->attach($amenityid);
        }

        return redirect('/admin')->with('success', 'Creat successful');

       
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        if(auth()->user()->types['id'] != 3){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->types['id'] != 3){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $condo = Condo::find($id);

        return view('admin.edit')->with('condo',$condo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->types['id'] != 3){
            return redirect('/')->with('error', 'Unauthorized Page');
        }   
        $this->validate($request, [
        'developers' => 'required',
        'name' => 'required'
        ]);

        $condo = Condo::find($id);
        $condo->developer_id = $request->input('developers');
        $condo->name = $request->input('name');
        $condo->address = $request->input('address');
        $condo->description = $request->input('description');
        $condo->license_no = $request->input('license');
        $condo->tin = $request->input('tin');
         
        $condo->save();

        $user = User::find($condo->pspecialist['id']);
        $user->name = $request->input('psname');
        $user->email = $request->input('email');
        $user->gender = $request->input('sex');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->phone_num = $request->input('mobnum');
        $user->telephone_num = $request->input('telnum');
        $user->save();
        

        $condo->amenities()->detach();

        $amenity_input = $request->input('amenities');

        if (is_null($amenity_input[0])){
            echo "yes texbox is null";
        }
        else{
            foreach($amenity_input as $amenity){
                $products = amenities::where('name', $amenity)->get();
                if(count($products)){
                    $products = amenities::where('name', $amenity)->first();
                    $amenityid = $products->id;
                    $condo->amenities()->attach($amenityid);
                }
                else{
                    $amenities = new amenities;
                    $amenities->name = $amenity;
                    $amenities->save();
    
                    $products = amenities::where('name', $amenity)->first();
                    $amenityid = $products->id;
                    $condo->amenities()->attach($amenityid);
                }
            }
        }
        
        $amenity_input = $request->input('amenity');
        if ($amenity_input==null){
            echo "yes checkbox is null";
        }
        else{
            foreach($amenity_input as $amenity2){
                $condo->amenities()->attach($amenity);
            }
        }
        return redirect('\admin\condos')->with('success','Condominium Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if(auth()->user()->types['id'] != 3){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $post = Post::find($id);
        $post->delete();
        $user = User::find($condo->pspecialist['id']);
        $user->delete();

        return redirect('\admin\condos')->with('success','Condominium Updated');
    }

}
