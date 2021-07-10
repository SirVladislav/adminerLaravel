<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        Session::flush();

        $request->validate([
            'username' => 'required|unique:users|max:255|min:4',
            'password' => 'required',
        ]);

        // if(User::where('username', '=', $request['username'])->exists()){  ///  unique:users validation
        //     //Redirect::back()->with('msg', 'User is already exists');
        //     return redirect()->back()->withErrors('user already exists!');
        // }

        $newUser = User::create([
            'username' => $request['username'],
            'password' => $request['password']
        ]);

        session()->put('username', $request['username']);
        session()->put('user_id', $newUser->id);

        return redirect('/main');
    }

    public function login(Request $request)
    {
        Session::flush();

        $user = User::where([
            'username' => $request['username'],
            'password' => $request['password']
        ])->first();

        if (!$user) {
            return redirect()->back()->withErrors('Check your login or password n try again');
        }

        if ($user->isAdmin) {
            session(['isAdmin' => true]);
            //dd($user->isAdmin);
        }

        session([
            'username' => $user->username,
            'user_id' => $user->id,
        ]);
        return redirect('/main');
    }

    public function adminpanelLoad()
    {
        $users = User::all();

        return view('adminpanel')->with('users', $users);
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();

        Note::where('user_id', $id)->delete();

        return redirect('adminpanel');
    }

    public function logout()
    {
        $msg = session()->get('username') . ' pokinul server ';
        Session::flush();
        return redirect('/login')->withErrors($msg);
    }
}
