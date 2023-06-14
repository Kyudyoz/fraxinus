<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Post;
use App\Models\User;
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
            ->filter(request(['search', 'category']))->paginate(3),
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
        $wishlists = $user->wishlists()->latest()->paginate(3);
        return view('home.wishlist', compact('wishlists','wishlistCount'));
    }

    public function userPosts()
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $user = auth()->user();
        return view('user.posts',[
            'wishlistCount' => $wishlistCount,
            'active'=>'My Posts',
            'user'=>$user,
            'posts' => Post::where('user_id', auth()->user()->id)->latest()->paginate(3)
        ]);
    }
    
    public function userProducts()
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $user = auth()->user();
        return view('user.products',[
            'wishlistCount' => $wishlistCount,
            'active'=>'My Products',
            'user'=>$user,
            'products' => Product::where('user_id', auth()->user()->id)->latest()->paginate(3)
        ]);
    }

    public function purchase(Request $request)
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $user = $request->user();
        return view('user.purchase', [
            'wishlistCount' => $wishlistCount,
            'active'=>'purchase',
            'user'=>$user,
            'purchases' => Buy::where('user_id', $user->id)->latest()->paginate(1)
        ]);
    }
    
    public function sale(Request $request)
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $user = $request->user();
        $products = Product::where('user_id', auth()->user()->id)->latest()->pluck('id')->toArray();
        $purchases = Buy::whereIn('product_id', $products)->latest()->paginate(1);
        return view('user.sale', [
            'wishlistCount' => $wishlistCount,
            'active'=>'sale',
            'user'=>$user,
            'products'=>$products,
            'purchases' => $purchases,
        ]);
    }
}
