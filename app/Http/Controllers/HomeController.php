<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    function alldata()
    {
        return view('home', ['users' => students::get()]);
    }

    function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }


    function addUser()
    {
        return view('adduser');
    }

    function addUserData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'number' => 'required|numeric',
            'image' => 'required',
            'updated_at' => now(),
            'created_at' => now(),
        ]);


        $imagename = time() . "." . $request->image->extension();
        $request->image->move(public_path('products'), $imagename);

        $students = new students;
        $students->name = $request->name;
        $students->email = $request->email;
        $students->address = $request->address;
        $students->city = $request->city;
        $students->number = $request->number;
        $students->img = $imagename;
        $students->save();
        return redirect()->route('alldata')->with('message', 'User Add Successfully');
    }

    function deleteData($id)
    {
        $data = students::find($id);
        $data->Delete();
        return redirect()->back()->with('message', 'Record Delete Successfully');
    }

    function updetData($id)
    {

        $students = students::where('id', $id)->get();
        // return dd($students->all());
        return view('updetUser', ['data' => $students]);

    }

    function updetUserData(request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'number' => 'required|numeric',
            'image' => 'nullable',
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        $students = students::where('id', $id)->first();

        if (isset($request->image)) {
            $imagename = time() . "." . $request->image->extension();
            $request->image->move(public_path('products'), $imagename);
            $students->img = $imagename;

        }

        $students->name = $request->name;
        $students->email = $request->email;
        $students->address = $request->address;
        $students->city = $request->city;
        $students->number = $request->number;
        $students->save();
        return redirect()->route('alldata')->with('message', 'User Updet Successfully');
    }

    function viewData($id){

        $singleUser = students::where('id',$id)->get();
        return view('view',['data' => $singleUser]);

    }



}