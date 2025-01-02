<?php

namespace App\Http\Controllers;

use App\Http\Requests\Idea\IdeaStoreRequest;
use App\Http\Requests\Idea\IdeaUpdateRequest;
use App\Models\Idea;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $ideas = Idea::query()->with('user:id,name,image','comments.user')
            ->orderBy('created_at', 'desc');
        if (request()->has('search')) {
            $ideas->where('idea_content', 'like', '%' . request('search') . '%');
        }

        return view('dashboard', ['ideas' => $ideas->paginate(5)]);
    }

    public function store(IdeaStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $idea = new Idea($data);
        auth()->user()->ideas()->save($idea);

        return redirect()->route('dashboard')->with('success', 'Idea added successfully!')->withInput();
    }

    public function edit(Idea $idea): View
    {
        $this->authorize('update',$idea);
        $editing = true;

        return view('idea.show', compact('idea', 'editing'));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(Idea $idea,IdeaUpdateRequest $request): RedirectResponse
    {
        $this->authorize('update',$idea);
        $data = $request->validated();
        $idea->idea_content = $data['content'];
        $idea->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Idea update successfully!');
    }

    public function destroy(Idea $idea): RedirectResponse
    {
        $this->authorize('update',$idea);
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea delete successfully!');
    }
    public function show(Idea $idea): View
    {
        $idea->load('comments');

        return view('idea.show', compact('idea'));
    }

}
