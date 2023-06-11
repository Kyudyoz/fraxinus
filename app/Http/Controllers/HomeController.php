<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        return view('home.home',[
            "products" =>Product::latest()
            ->filter(request(['search', 'category']))->paginate(3)->withQueryString(),
            'wishlistCount' => $wishlistCount
        ]);
    }

    public function wishlist(Request $request)
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $user = $request->user();
        $wishlists = $user->wishlists()->latest()->paginate(3)->withQueryString();
        return view('home.wishlist', compact('wishlists','wishlistCount'));
    }

    public function user()
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        return view('home.user',compact('wishlistCount'));
    }
}
