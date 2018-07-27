<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
    
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function amenities(){
        return $this->belongsToMany(amenities::class);
    }

    public function condos(){
        return $this->belongsTo(Condo::class);
    }

    public function scopeSearch($query, $search_term){
        return $query->whereHas('condos',function($query) use($search_term){

            $query->where('name','like','%'.$search_term. '%');

        })->orWhere('title','like','%'.$search_term. '%')->orWhere('body','like','%'.$search_term. '%')->orWhere('body','like','%'.$search_term. '%');
        
    }
    public function images(){
        return $this->hasMany(image::class);
    }
}
