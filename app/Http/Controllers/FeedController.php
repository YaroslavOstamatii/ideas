<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function __invoke(Request $request)
    {
        $authUser = auth()->user();

        $ideas = Idea::query()
            ->with('user:id,name,image', 'comments.user')
            ->whereIn('user_id', $authUser->followings()->pluck('id'))
            ->when(request()->has('search'), function ($query) {
                $query->search(request('search'));
            })
            ->latest()
            ->paginate(5);

        return view('dashboard', ['ideas' => $ideas]);
    }
}
