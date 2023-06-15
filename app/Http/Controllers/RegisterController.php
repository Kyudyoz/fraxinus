<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login.signup');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'address' => 'required',
            'password' => 'required|min:6',
            
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        session()->flash('success', 'Registration Success! Please Login');
        return redirect('/signin');
    }
}
