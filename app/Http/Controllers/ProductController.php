<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $product = Product::find($id);
        $user = User::find($id);
        return view('home.show', compact('product','user','wishlistCount'));
    }

    public function edit($id)
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $product = Product::find($id);
        return view('home.edit', compact('product','wishlistCount'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return redirect('/home');
    }

    public function create()
    {
        return view('home.new');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'price' => 'required',
            'image'=> 'required',
            'description' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Product::create($validatedData);
        return redirect('/home')->with('berhasil', 'New product has been added!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/home');
    }
}
