<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaStoreRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Idea::query()->orderBy('created_at', 'desc');
        if (request()->has('search')) {
            $ideas->where('content', 'like', '%' . request()->get('search') . '%');
        }

        return view('dashboard', ['ideas' => $ideas->paginate(5)]);
    }

    public function store(IdeaStoreRequest $request)
    {
        $data = $request->validated();
        $idea = new Idea($data);
        auth()->user()->ideas()->save($idea);

        return redirect()->route('dashboard')->with('success', 'Idea added successfully!');
    }

    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $editing = true;

        return view('idea.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea, Request $request)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404);
        }
        $data = $request->validate([
            'content' => 'required|string|min:3|max:240',
        ]);
        $idea->update($data);

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea update successfully!');
    }

    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            return redirect()->back()->with('success', 'You cant delete this ideas');
        }
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea delete successfully!');
    }

    public function show(Idea $idea)
    {
        $comments = $idea->comments;

        return view('idea.show', compact('idea', 'comments'));
    }

}
