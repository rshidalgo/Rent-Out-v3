<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class Email extends Controller
{
    
    public function siteVisit() {
        // Request $request

        $data = array(
            'name' => "Unit Site Visit",
        );
    
        Mail::send('/welcome', $data, function ($message) {
    
            $message->from('elliotwalteriq@gmail.com', 'Rentout Property Specialist');
    
            $message->to('elliotwalteriq@gmail.com')->subject('Site Visit Request');
    
        });
    
        return redirect('\post')->with('success','Site Visit Request Sent!');
    
    }


    public function book() {

        $data = array(
            'name' => "Unit Booking",
        );
    
        Mail::send('/welcome', $data, function ($message) {
    
            $message->from('elliotwalteriq@gmail.com', 'Rentout Property Specialist');
    
            $message->to('elliotwalteriq@gmail.com')->subject('Booking Request');
    
        });
    
        return redirect('\post')->with('success','Booking Request Sent!');
    
    }
}
