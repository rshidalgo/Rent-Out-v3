<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    // Table Name
    protected $table = 'developer';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function Condo(){
        return $this->hasMany(Condo::class);
    }
}
