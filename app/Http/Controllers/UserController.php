<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'unique:users',
            'role' => 'required',
            'password' => 'required|confirmed'

        ]);

        $data['status'] = 1;
        $data['password'] = bcrypt($data['password']);

        User::create($data);
    }

    public function login_index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt(['username'=>$data['username'],'password'=>$data['password']]))
        {
            return redirect('/sales');
        }
        else
        {
            return redirect('/login')->withErrors(['login'=>'Invalid Username or Password!']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
