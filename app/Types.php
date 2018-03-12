<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
       // Table Name
       protected $table = 'types';
       // Primary Key
       public $primaryKey = 'id';
    public function user(){
        return $this->hasMany(User::class);
    }
}
