<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $table = 'genres';
    protected $fillable = ['genre'];
    
    //Relation with Movies
    public function movies()
    {
    	return $this->hasMany('App\Movie');
    }

}
