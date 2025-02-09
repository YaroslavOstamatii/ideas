<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        return view('admin.ideas.index',['ideas'=>Idea::with('user')->latest()->paginate(5)]);
    }
}
