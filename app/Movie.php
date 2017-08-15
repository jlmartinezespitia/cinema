<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;

class Movie extends Model
{
    //
    protected $table = 'movies';
    protected $fillable = ['name','path','cast','direction','duration','genre_id'];

    public function setPathAttribute($path){
    	if(!empty($path)){
            $this->attributes['path'] = Carbon::now()->second.$path->getClientOriginalName();
        	$name = Carbon::now()->second.$path->getClientOriginalName();
        	$contents = File::get($path);
        	Storage::disk('public')->put($name, $contents);
        }
    }

    public static function Movies(){
        return DB::table('movies')
            ->join('genres','genres.id','=','movies.genre_id')
            ->select('movies.*','genres.genre')
            ->get();
    }
    
    //Relation with Genres
    public function genres()
    {
    	return $this->belongsTo('App\Genre');
    }

}
