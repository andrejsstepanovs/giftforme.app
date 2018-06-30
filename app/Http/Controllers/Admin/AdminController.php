<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\GiftList;

class AdminController extends Controller
{
    public function index()
    {
        $list = new GiftList();

        return view('/list/main', compact('list'));
    }
}
