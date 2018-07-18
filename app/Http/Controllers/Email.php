<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use Auth;
use App\Mail\PropertyS;
use App\Mail\CustomerS;
use Carbon\Carbon;

class Email extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function book(Request $request) {
        $ps = $request->input('propertyE');
        $data = array(
            'request' => "Unit Booking",
            'optional' => $request->input('optional'),
            'title' => $request->input('title'),
            'condo' => $request->input('condo'),
            'propertyS' => $request->input('propertyS'),
            'propertyE' => $request->input('propertyE'),
            'customer' => auth()->user()->name,
            'customerE' => auth()->user()->email,
            'customerP' => auth()->user()->phone_num,
            'customerT' => auth()->user()->telephone_num,
            'duration' => $request->input('duration'),
        );

        //Send Mail To Customer
        Mail::to(auth()->user()->email)->send(new CustomerS($data));

        //Send Mail to Property Specialist
        Mail::to($request->input('propertyE'))->send(new PropertyS($data));


        return redirect('\post')->with('success','Booking Request Sent!');
    
    }

    public function siteVisit(Request $request) {
        // Request $request

        $this->validate($request, [
            'date' => 'required',
        ]);

        $data = array(
            'request' => "Site Visit",
            'optional' => $request->input('optional'),
            'title' => $request->input('title'),
            'condo' => $request->input('condo'),
            'propertyS' => $request->input('propertyS'),
            'propertyE' => $request->input('propertyE'),
            'customer' => auth()->user()->name,
            'customerE' => auth()->user()->email,
            'customerP' => auth()->user()->phone_num,
            'customerT' => auth()->user()->telephone_num,
            'time' => $request->input('time'),
            'date' => $request->input('date'),
        );

        // Send Email Notification To Customer
        Mail::to(auth()->user()->email)->send(new CustomerS($data));

        // Send Email Notification To Property Specialist
        Mail::to($request->input('propertyE'))->send(new PropertyS($data));

        return redirect('\post')->with('success','Site Visit Request Sent!');
    
    }
}
