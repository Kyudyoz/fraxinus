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
            return redirect('/home')->with('gagal', 'Produk sudah ada di Wishlist anda');
        }

        // Tambahkan produk ke Wishlist pengguna
        Wishlist::create([
            'product_id' => $id,
            'user_id' => $user->id,
        ]);

        return redirect('/home')->with('berhasil', 'Produk berhasil ditambahkan ke wishlist anda');
    }
    public function destroy($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect('/wishlist')->with('berhasil', 'Produk berhasil dihapus dari wishlist anda');
    }
}
