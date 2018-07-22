<?php

namespace App\Http\Controllers\Admin;

use App\Gift;
use App\GiftList;
use App\Http\Requests\SaveGift;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class GiftController extends Controller
{
    public function edit(int $id)
    {
        $gift = Gift::find($id);
        if (!$gift) {
            return redirect()->route('console/list');
        }

        $list = GiftList::find($gift->gift_list_id);

        if ($list->user->id != Auth::user()->id) {
            throw new \RuntimeException();
        }

        return view('/gift/edit', compact('gift', 'list'));
    }

    public function save(int $id, SaveGift $request)
    {
        $validated = $request->validated();
        $gift = new Gift();

        if ($id) {
            $gift = $gift->find($id);
            if ($request->get('delete') == 'delete') {
                $gift->delete();
                return redirect()->route('console/list/edit', ['id' => $gift->giftList->id])->with('status', 'Deleted!');
            }
        }

        $gift->description  = $validated['description'];
        $gift->name         = $validated['name'];
        $gift->gift_list_id = $validated['gift_list_id'];
        $gift->save();

        return redirect()->route('console/gift/edit', ['id' => $gift->id])->with('status', 'Saved!');
    }
}
