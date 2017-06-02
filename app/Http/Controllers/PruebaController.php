<?php

namespace Cinema\Http\Controllers;

use Cinema\User;
use Cinema\Http\Controllers\Controller;

class PruebaController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function index() {
        return "hola desde PruebaController";
    }

    public function nombre($nombre) {
        return "hola mi nombre es: ".$nombre;
    }
}