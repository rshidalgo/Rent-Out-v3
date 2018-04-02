<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class amenities extends Model
{
    public function Post(){
        return $this->belongsToMany(Post::class);
    }

    public function Condo(){
        return $this->belongsToMany(Condo::class);
    }
}
