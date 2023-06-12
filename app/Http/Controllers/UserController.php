<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'image'=> 'image|file|max:1024',
        ];
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('user-images');
        }
        $id = $request->id;
        $validatedData['id'] = $id;

        User::where('id', $id)->update($validatedData);
        return redirect('/userPosts');
    }

    public function edit($id)
    {
        if (auth()->check()) {
            $wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $wishlistCount = "";
        }
        $user = User::find($id);
        return view('user.edit', [
            'user'=>$user,
            'wishlistCount'=>$wishlistCount,
            'active'=> 'setting'
        ]);
    }

    public function updates(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ];
        $validatedData = $request->validate($rules);

        User::where('id', $id)->update($validatedData);
        return redirect("user/$id/edit")->with('berhasil', 'Profle has been updated!');
    }
}
