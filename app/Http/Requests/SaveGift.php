<?php

namespace App\Http\Requests;

use App\Gift;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SaveGift extends FormRequest
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
            $gift = Gift::find($id);
            if (!$gift || $gift->giftList->user->id != Auth::user()->id) {
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
            'name'         => 'required|min:2|max:255',
            'description'  => 'present',
            'gift_list_id' => 'required|exists:gift_lists,id',
        ];
    }
}
