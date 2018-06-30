<?php

namespace App\Http\Controllers;

use App\Gift;
use App\GiftList;

class PublicController extends Controller
{
    public function show(int $id)
    {
        $list = GiftList::findOrFail($id);
        if ($list->visibility != 'public') {
            return redirect('/');
        }

        $viewed = session('viewed', []);
        if (!in_array($list->id, $viewed)) {
            $viewed[] = $list->id;
            $list->increment('views');
        }
        session(['viewed' => $viewed]);

        return view('/show/list', compact('list'));
    }

    public function like(int $id)
    {
        $gift = Gift::findOrFail($id);
        if ($gift->giftList->visibility != 'public') {
            return redirect('/');
        }

        $liked = session('likes', []);
        if (!in_array($gift->id, $liked)) {
            $gift->increment('likes');
            $liked[] = $gift->id;
        }
        session(['likes' => $liked]);

        return back();
    }

    public function unlike(int $id)
    {
        $gift = Gift::findOrFail($id);
        if ($gift->giftList->visibility != 'public') {
            return redirect('/');
        }

        $liked = session('likes', []);
        if (in_array($gift->id, $liked)) {
            $gift->decrement('likes');
            $key = array_search($gift->id, $liked);
            unset($liked[$key]);
        }
        session(['likes' => $liked]);

        return back();
    }

    public function gift(int $id)
    {
        $gift = Gift::findOrFail($id);
        if ($gift->giftList->visibility != 'public') {
            return redirect('/');
        }

        return view('/show/gift', compact('gift'));
    }


    public function claim(int $id)
    {
        $gift = Gift::findOrFail($id);

        if ($gift->giftList->visibility != 'public') {
            return redirect('/');
        }

        $claimed = session('claimed', []);
        if (!in_array($gift->id, $claimed)) {
            $claimed[] = $gift->id;
        }
        session(['claimed' => $claimed]);

        return back();
    }

    public function unclaim(int $id)
    {
        $gift = Gift::findOrFail($id);
        if ($gift->giftList->visibility != 'public') {
            return redirect('/');
        }

        $claimed = session('claimed', []);
        if (in_array($gift->id, $claimed)) {
            $key = array_search($gift->id, $claimed);
            unset($claimed[$key]);
        }
        session(['claimed' => $claimed]);

        return back();
    }
}
