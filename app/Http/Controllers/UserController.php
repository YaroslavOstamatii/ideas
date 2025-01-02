<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view('user.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //$editing = true;
        $this->authorize('update',$user);

        $ideas = $user->ideas()->paginate(5);
        return view('user.edit', compact('user', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function profile()
    {
        return $this->show(auth()->user());
    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update',$user);
        $data = $request->validated();

        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            $data['image'] = $imagePath;
            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($data);

        return redirect()->route('profile');
    }

}
