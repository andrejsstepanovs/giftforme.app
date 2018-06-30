<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gift extends Model
{
    use SoftDeletes;

    public function giftList()
    {
        return $this->belongsTo(GiftList::class);
    }
}
