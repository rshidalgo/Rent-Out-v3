<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condo extends Model
{
    // Table Name
    protected $table = 'condos';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function developer(){
        return $this->belongsTo(Developer::class);
    }
}
