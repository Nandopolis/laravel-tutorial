<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests\UserCreateRequest;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Cinema\Transformers\UserTransformer;
use Cinema\Transformers\RoleTransformer;
use Session;
use Redirect;
use Cinema\User;
use Cinema\Role;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::All();
        foreach ($users as $user) {
            $user -> roles;
        }
        return view('usuario.index', compact('users'));
    }

    public function indexJ()
    {
        //
        $fractal = new Manager();
        $users = User::All();
        $resource = new Collection($users, new UserTransformer);
        $fractal -> parseIncludes('roles');
        $array = $fractal->createData($resource)->toArray();
        return response() -> json($array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        //
        $user = User::create([
            'name'      => $request['name'],
            'email'     => $request['email'],
            'password'  => $request['password'],
        ]);

        $roles = explode(",", $request['role']);

        foreach ($roles as $role) {
            Role::create([
                'user_id'   => $user->getKey(),
                'name'      => trim($role),
            ]);
        }
        

        Session::flash('message', 'Usuario creado exitosamente');
        return Redirect::to('/usuario');
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
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('usuario.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $user -> fill($request -> all());
        $user -> save();

        Session::flash('message', 'Usuario editado correctamente');
        return Redirect::to('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::destroy($id);
        Session::flash('message', 'Usuario eliminado correctamente');
        return Redirect::to('/usuario');
    }
}
