<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Session;
use Redirect;

class UsuarioController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    // SIN AJAX
    /*public function index()
    {
        $users = User::paginate(15);
        return view('usuario.index', compact('users'));
    }*/
    public function index(Request $request)
    {
        $users = User::paginate(16);
        if($request->ajax()){
            return response()->json(view('usuario.users',compact('users'))->render());
        }
        return view('usuario.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        //$user = User::find($id); SUSTITUIDO
        return view('usuario.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        // $user = User::find($id); SUSTITUIDO
        $user->fill($request->all());
        $updated = $user->save();
        $message = $updated ? 'Usuario editado correctamente!' : 'El usuario NO pudo editarse';
        Session::flash('message',$message);
        return Redirect::to('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user = User::find($id); SUSTITUIDO
        $deleted = $user->delete();
        $message = $deleted ? 'Usuario eliminado correctamente!' : 'El usuario NO pudo eliminarse';
        Session::flash('message',$message);
        return Redirect::to('/usuario');
    }
}
