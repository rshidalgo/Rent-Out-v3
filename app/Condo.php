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
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function amenities(){
        return $this->belongsToMany(amenities::class);
    }
    public function pspecialist(){
        return $this->hasOne(User::class);
    }
}
