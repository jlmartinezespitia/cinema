<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;
use Session;
use Redirect;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::Movies();
        return view('pelicula.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$genres = Genre::lists('genre','id'); //deprecated
        $genres = Genre::pluck('genre','id');
        return view('pelicula.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movie::create($request->all());
        Session::flash('message','Película creada correctamente');
        return Redirect::to('/pelicula');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::pluck('genre','id');
        return view('pelicula.edit', compact('movie','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->fill($request->all());
        $updated = $movie->save();
        $message = $updated ? 'Película editada correctamente!' : 'La película NO pudo editarse';
        Session::flash('message',$message);
        return Redirect::to('/pelicula');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
         
        $deleted = $movie->delete();
        Storage::disk('public')->delete($movie->path);
        $message = $deleted ? 'Película eliminada correctamente!' : 'La película NO pudo eliminarse';
        Session::flash('message',$message);
        return Redirect::to('/pelicula');
    }
}
