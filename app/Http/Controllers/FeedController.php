<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $authUser = auth()->user();

        $ideas = Idea::query()->with('user:id,name,image','comments.user')
            ->whereIn('user_id', $authUser->followings()->pluck('id'))
            ->orderBy('created_at', 'desc');
        if (request()->has('search')) {
            $ideas->where('idea_content', 'like', '%' . request('search') . '%');
        }

        return view('dashboard', ['ideas' => $ideas->paginate(5)]);
    }
}
