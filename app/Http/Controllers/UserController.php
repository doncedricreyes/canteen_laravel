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
        $users = User::paginate(10);
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

    public function user_update(User $id, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'username' => ['required',Rule::unique('users')->ignore($id->id)],
            'email' => [Rule::unique('users')->ignore($id->id)],
            'role' => 'required',
            'password' => 'confirmed'
        ]);
        if($request->filled('password'))
        {
        $password = bcrypt($data['password']);
        $id->password = $password;
        }

        $id->name = $data['name'];
        $id->username = $data['username'];
        $id->email = $data['email'];
        $id->role = $data['role'];
        
        if($id->save())
        {
            Alert::success('Account Updated!', 'Your account has been successfully updated.');
            return redirect('/users');
        }
    }

    public function user_remove(User $id)
    {
        $id->status = 0;
        $id->save();
        Alert::success('Account Removed!', 'Your account has been successfully removed.');
        return redirect('/users');
    }

    public function user_restore(User $id)
    {
        $id->status = 1;
        $id->save();
        Alert::success('Account Restored!', 'Your account has been successfully restored.');
        return redirect('/users');
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
            Alert::error('Invalid Account!', 'Invalid username or password. Please try again.')->persistent(true);
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
