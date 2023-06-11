<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request, $id)
    {
        $user = $request->user(); // Mendapatkan data pengguna yang sedang terautentikasi

        // Cek apakah produk sudah ada di Wishlist pengguna
        $existingWishlist = Wishlist::where('product_id', $id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingWishlist) {
            return redirect('/')->with('gagal', 'Product already exists in your wishlist');
        }

        // Tambahkan produk ke Wishlist pengguna
        Wishlist::create([
            'product_id' => $id,
            'user_id' => $user->id,
        ]);

        return redirect('/')->with('berhasil', 'Product has been added to your wishlist');
    }
    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect('/wishlist')->with('berhasil', 'Product has been deleted from your wishlist');
    }
}
