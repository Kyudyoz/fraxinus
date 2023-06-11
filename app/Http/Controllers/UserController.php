<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}
