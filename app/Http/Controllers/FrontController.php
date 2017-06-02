<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "index";
    }

    public function contacto()
    {
        //
        return "contacto";
    }

    public function reviews()
    {
        //
        return "reviews";
    }

    public function admin()
    {
        //return "admin";
        return view('admin.index');
    }

}
