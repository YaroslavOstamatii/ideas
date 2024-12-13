<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea){
        request()->validate([
            'comment' => 'required|string|min:3|max:240',
        ]);
        $idea->comments()->create([
            'comment' => request('comment'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('idea.show', $idea->id)
            ->with('success','comment added successfuly');
    }
}
