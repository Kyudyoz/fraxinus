<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addToComment(Request $request, $id)
    {
        $validatedData['comment'] = $request->comment;
        $validatedData['post_id'] = $id;
        $validatedData['user_id'] = auth()->user()->id;
        Comment::create($validatedData);

        return redirect("/posts/show/$id");
    }
}
