<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function create($id)
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $product = Product::find($id);
        return view('purchase.buy-form',[
            'wishlistCount' => $wishlistCount,
            'product' => $product
        ]);
    }
    public function store(Request $request, $id)
    {
        
        $product = Product::find($id);
        $validatedData = $request->validate([
            'delivery' => 'required',
        ]);
        $validatedData['product_id'] = $product->id;
        $validatedData['user_id'] = auth()->user()->id;
        if ($request->delivery == "yes") {
            $validatedData['total'] = intval($product->price) + 20000;
        } else {
            $validatedData['total'] = intval($product->price) + 0;
        }
        $validatedData['delivery'] = $request->delivery;
        $validatedData['status'] = "Deliver";
        Buy::create($validatedData);
        $product->qty -= 1;
        $product->save();
        return redirect('/userPurchase');
    }

    public function done($id)
    {
        
        $purchase = Buy::where('id',$id)->first();
   
        $purchase->status = 'Delivered';
        
        $purchase->save();
        return redirect('/userPurchase');
    }

}
