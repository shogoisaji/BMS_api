<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = Comment::create([
            'comment' => $request->comment,
            'stock_book_id' => $request->stock_book_id,
            'user_id' => auth()->id(),
            'recommend' => (int) $request->recommend,
        ]);

        $comment->save();

        return response()->json(['success' => 'Your comment has been posted!'], 201);
    }
}