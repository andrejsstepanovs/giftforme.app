<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SaveList;
use Illuminate\Support\Facades\Auth;
use App\GiftList;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user  = Auth::user();
        $lists = GiftList::where('user_id', $user->id)->get();
        
        return view('/list/main', compact('lists', 'user'));
    }

    public function edit(int $id)
    {
        $list = new GiftList();
        if ($id) {
            $list = $list->findOrFail($id);
            if ($list->user->id != Auth::user()->id) {
                throw new \RuntimeException('');
            }
        }

        return view('/list/edit', compact('list'));
    }

    public function save(int $id, SaveList $request)
    {
        $validated = $request->validated();

        $giftList = new GiftList();

        if ($id) {
            $giftList = $giftList->find($id);
            if ($request->get('delete') == 'delete') {
                $giftList->delete();
                return redirect('console/list')->with('status', 'Deleted!');
            }
        }

        $giftList->user_id      = Auth::user()->id;
        $giftList->name         = $validated['name'];
        $giftList->description  = $validated['description'];
        $giftList->visibility   = $validated['visibility'];
        $giftList->save();

        return redirect()->route('console/list/edit', ['id' => $giftList->id])->with('status', 'Saved!');
    }
}
