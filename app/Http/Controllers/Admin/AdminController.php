<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\GiftList;

class AdminController extends Controller
{
    public function index()
    {
        $list = new GiftList();
        $user = Auth::user();

        return view('/list/main', compact('list', 'user'));
    }
}
