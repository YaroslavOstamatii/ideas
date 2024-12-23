<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        $current_user= auth()->user();
        $current_user->likes()->attach($idea);

        return redirect()->back();
    }
    public function unlike(Idea $idea)
    {
        $current_user= auth()->user();
        $current_user->likes()->detach($idea);

        return redirect()->back();

    }
}
