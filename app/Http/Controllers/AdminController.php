<?php

namespace App\Http\Controllers;
use App\User;
use App\Condo;
use App\Developer;
use App\amenities;
use App\image;
use Illuminate\Support\Facades\Hash;
use Auth;
use Storage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
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
            'telnum' => 'required',
            'cover_image' => 'required'
        ]);

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
        $condo = new Condo;
        $condo->developer_id = $request->input('developers');
        $condo->name = $request->input('name');
        $condo->address = $request->input('address');
        $condo->description = $request->input('description');
        $condo->license_no = $request->input('license');
        $condo->tin = $request->input('tin');
        $condo->cover_image = $fileNameToStore;
        $condo->city = $request->input('city');
        $condo->save();
    
        $default_picture = "defaultprofile.jpg";
        User::create([
            'name' => $request->input('psname'),
            'email' => $request->input('email'),
            'gender' => $request->input('sex'),
            'date_of_birth' => $request->input('date_of_birth'),
            'phone_num' => $request->input('mobnum'),
            'telephone_num' => $request->input('telnum'),
            'password' => Hash::make('rentoutpassword123'),
            'profile_picture' => $default_picture,
        ]);
        
        $type = User::orderby('created_at','desc')->first();
        $type->types_id = 2;

        $condo = Condo::orderby('created_at','desc')->first();
        $type->condos_id = $condo->id;
        $type->save();

        $condo2 = Condo::find($condo->id);
        $condo2->user_id = $type->id;
        $condo2->save();

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 
        $condo = Condo::find($id);
        $pspecialist = User::find($condo->user_id);
        return view('admin.edit')->with('condo',$condo)->with('pspecialist',$pspecialist);
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

        $this->validate($request, [
        'developers' => 'required',
        'name' => 'required'
        ]);

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

        $condo = Condo::find($id);
        $condo->developer_id = $request->input('developers');
        $condo->name = $request->input('name');
        $condo->address = $request->input('address');
        $condo->description = $request->input('description');
        $condo->license_no = $request->input('license');
        $condo->tin = $request->input('tin');
        if($request->hasFile('cover_image')){
            $condo->cover_image = $fileNameToStore;
        }
        $condo->save();

        $user = User::find($condo->user_id);
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
                $condo->amenities()->attach($amenity2);
            }
        }
        return redirect('\admin\condos')->with('success','Condominium Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function users_index(){
        $users = User::where('types_id', '=', 2)->get();
        return view ('manage.user')->with('users',$users);
    }
    public function status($id){
        $pspecialist = User::find($id);
        $condo = Condo::find($pspecialist->condos['id']);
        
        if($condo->status == 0){
            $condo->status = 1;
            $condo->save();
        }
        elseif($condo->status == 1){
            $condo->status = 0;
            $condo->save();
        }
        return redirect('\admin\users')->with('success','Transaction Complete');
    }
}