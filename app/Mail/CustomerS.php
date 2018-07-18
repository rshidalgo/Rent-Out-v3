<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerS extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    if($this->data['request'] == "Site Visit"){
        $this->subject('Site Visit Request')->view('email.sitevisit')->with([
            'request' => $this->data['request'],
            'title' => $this->data['title'],
            'condo' => $this->data['condo'],
            'propertyS' => $this->data['propertyS'],
            'propertyE' => $this->data['propertyE'],
        ]);
    }
    elseif($this->data['request'] == "Unit Booking"){
        $this->subject('Booking Request')->view('email.book')->with([
            'request' => $this->data['request'],
            'title' => $this->data['title'],
            'condo' => $this->data['condo'],
            'propertyS' => $this->data['propertyS'],
            'propertyE' => $this->data['propertyE'],
        ]);
    }
        
    }
    
    
}
