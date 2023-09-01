<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    function home()
    {
        return view('welcome');
    }
    function register()
    {
        return view('register');
    }



    function registerpost(Request $req)
    {
        $req->validate([
            'userName' => 'required',
            'userEmail' => 'required|unique:users,email,'.$req->id,
            'userPassword' => 'required',
        ]);

        // dd($req->all());
        $user = new User();
        $user->name = $req->userName;
        $user->email = $req->userEmail;
        $user->password = Hash::make($req->userPassword);
        $user->save();
        return redirect()->route('login')->with('message', 'Register Successfully');

    }

    function login()
    {
        return view('login');
    }
    function loginpost(Request $request)
    {

        $credetials = [
            'email' => $request->Useremail,
            'password' => $request->Userpassword
        ];

        if (Auth::attempt($credetials)) {
            return redirect()->route('alldata');
        }
        return redirect()->back()->with('message', 'E-Mail id or Password Invalide');

    }

}