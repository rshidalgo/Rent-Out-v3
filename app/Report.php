<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // Table Name
    protected $table = 'reports';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    const UPDATED_AT = 'reserved_at';
}
