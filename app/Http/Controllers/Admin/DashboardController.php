<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     * @throws AuthorizationException
     */
    public function index()
    {
//        $this->authorize('admin');
//        if (!Gate::allows('admin')){
//            abort(403);
//        }
        return view('admin.dashboard');
    }
}
