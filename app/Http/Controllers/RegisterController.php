<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            // 'active' => 'register'  
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedData=$request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required',
            'no_telp' => 'required|unique:users|numeric',
            'no_sim' => 'required|unique:users|numeric',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);


        //Memasukkan data form ke database
        User::create($validatedData);

        //Redirect ke halaman login
        return redirect('/login')->with('success', 'Registration successful! Please login');
    }
}
