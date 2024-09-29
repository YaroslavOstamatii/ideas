<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', ['ideas' => Idea::orderBy('created_at', 'desc')->paginate(5)]);
    }
    public function store(Request $request){
        $data = $request->validate([
            'content'=>'required|string|min:3|max:240',
        ]);
        Idea::create($data);

        return redirect()->route('dashboard')->with('success', 'Idea added successfully!');
    }
    public function delete(Idea $idea){
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea delete successfully!');
    }
}
