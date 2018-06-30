<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('/profile/index', compact('user'));
    }

    public function save(Request $request)
    {
        $user = Auth::user();

        $user->description = $request->get('description');
        $user->save();

        return redirect('admin/profile')->with('status', 'Saved!');;
    }
}
