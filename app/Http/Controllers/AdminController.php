<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Condo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

}
