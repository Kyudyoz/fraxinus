<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $rules = [
            'name' => 'required|max:255',
            'category' => 'required',
            'price' => 'required',
            'image'=> 'image|file|max:1024',
            'description' => 'required'
        ];
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }
        $validatedData['user_id'] = auth()->user()->id;

        Product::where('id', $id)->update($validatedData);
        return redirect('/home')->with('berhasil', 'Product has been updated!');
    }

    public function create()
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        return view('home.new',[
            'wishlistCount' => $wishlistCount
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'price' => 'required',
            'image'=> 'required|image|file|max:1024',
            'description' => 'required'
        ]);
        $validatedData['image'] = $request->file('image')->store('product-images');
        $validatedData['user_id'] = auth()->user()->id;
        
        Product::create($validatedData);
        return redirect('/home')->with('berhasil', 'New product has been added!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $wishlist = Wishlist::where('product_id', $product->id);
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();
        $wishlist->delete();
        return redirect('/home')->with('berhasil', 'Product has been removed!');
    }
}
