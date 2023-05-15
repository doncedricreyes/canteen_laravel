<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('auth.index',['users'=>$users]);
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

        if(User::create($data))
        {
            Alert::success('Account Updated!', 'Your account has been updated successfully.');
            return redirect()->route('user_index');
        }
        else
        {
            
        }
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

    public function profile()
    {
        return view('users.profile');
    }

    public function update_profile(Request $request)
    {
        $user = Auth()->user();

 

        $data = $request->validate([
            'name' => 'required',
            'username' => ['required',Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|confirmed'

        ]);

        if($request->filled('password'))
        {
            $password = bcrypt($data['password']);
            $user->password = $password;
        }

        $user->username = $request->username;
        $user->name = $request->name;

        if($user->save())
        {
            Alert::success('Account Updated!', 'Your account has been updated successfully.');
            return redirect()->back();
        }
    }
}
