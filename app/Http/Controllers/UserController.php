<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $ideas = $user->ideas()->paginate(5);
        return view('user.edit', compact('user',  'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function profile()
    {
        return $this->show(auth()->user());
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'image' => 'image',
            'name' => 'required|min:3|max:40',
            'bio' => 'sometimes|nullable|min:3|max:255',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $data['image'] = $imagePath;
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        }

        $user->update($data);

        return redirect()->route('profile');
    }

}
