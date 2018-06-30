<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftList extends Model
{
    use SoftDeletes;

    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
