<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id', 'ASC')->get();

        return view('user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'O nome é obrigatório!',

            'telefone.required' => 'O telefone é obrigatório!',
            'telefone.min' => 'O telefone deve ter 11 digitos!',

            'email.required' => 'O email é obrigatório!',
            'email.unique' => 'O email já existe!',

            'password.required' => 'A senha é obrigatório!',
            'password.min' => 'A senha deve ter no mínimo 6 digitos!',
        ];

        $request->validate(
            [
                'name' => 'required|min:2',
                'telefone' => 'required|min:11',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:6',
            ],
            $messages
        );

        $user = new User();
        $user->name = $request->name;
        $user->telefone = $request->telefone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->permissao = $request->permission;

        $user->save();

        return redirect('/user')->with(
            'status',
            'Usuario criado com sucesso!!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/user')->with(
            'status',
            'Usuário excluido com sucesso!'
        );
    }
}