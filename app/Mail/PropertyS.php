<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class PropertyS extends Mailable
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
            return $this->subject('Customer Site Visit Request')->view('email.adminsitevisit')->with([
                'propertyE' => $this->data['propertyE'],
                'propertyS' => $this->data['propertyS'],
                'title' => $this->data['title'],
                'customer' => $this->data['customer'],
                'customerE' => $this->data['customerE'],
                'customerP' => $this->data['customerP'],
                'customerT' => $this->data['customerT'],
                'optional' => $this->data['optional'],
                'time' => $this->data['time'],
                'date' => $this->data['date'],
            ]);
        }
        else{
            return $this->subject('Customer Booking Request')->view('email.adminbook')->with([
                'propertyE' => $this->data['propertyE'],
                'propertyS' => $this->data['propertyS'],
                'title' => $this->data['title'],
                'customer' => $this->data['customer'],
                'customerE' => $this->data['customerE'],
                'customerP' => $this->data['customerP'],
                'customerT' => $this->data['customerT'],
                'optional' => $this->data['optional'],
                'duration' => $this->data['duration'],
            ]);
        }
        
    }
}
