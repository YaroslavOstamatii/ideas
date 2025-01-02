<?php

namespace App\Http\Controllers;

use App\Http\Requests\Idea\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Idea $idea){
        $data = $request->validated();
        $idea->comments()->create([
            'comment' => $data['comment'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('idea.show', $idea->id)
            ->with('success','comment added successfuly');
    }
}
