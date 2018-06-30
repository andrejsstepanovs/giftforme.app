<?php

namespace App\Http\Requests;

use App\GiftList;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SaveList extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $id = $this->route('id');
        if ($id) {
            $giftList = GiftList::find($id);
            if (!$giftList || $giftList->user->id != Auth::user()->id) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|min:2|max:255',
            'description' => 'present',
            'visibility'  => 'required|in:public,private',
        ];
    }
}
