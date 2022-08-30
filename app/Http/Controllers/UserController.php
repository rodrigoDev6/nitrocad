<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use App\Models\User;
use Exception as GlobalException;

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
            'name.required' => 'O Nome é obrigatório!',

            'phone.required' => 'O Telefone é obrigatório!',
            'phone.min' => 'O Telefone deve ter 11 digitos!',

            'level.required' => 'O Nível é obrigatório!',
            'level.min' => 'O telefone deve ter 11 digitos!',

            'email.required' => 'O E-mail é obrigatório!',
            'email.unique' => 'O E-mail já existe!',

            'password.required' => 'A senha é obrigatório!',
            'password.min' => 'A senha deve ter no mínimo 6 digitos!',
        ];
        $request->validate(
            [
                'name' => 'required|min:2',
                'phone' => 'required|min:11',
                'level' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:6',
            ],
            $messages
        );

        try {
            $user = new User();
            $user->name = $request->name;
            $user->telefone = $request->phone;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->nivel_id = $request->level;

            $user->save();
            return redirect('/user')->with(
                'statusCreate',
                'Usuario criado com sucesso!!'
            );
        } catch (GlobalException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
        } catch (GlobalException $e) {
            return $e->getMessage();
        }

        return redirect('/user')->with(
            'statusExcluido',
            'Usuário excluido com sucesso!'
        );
    }
}