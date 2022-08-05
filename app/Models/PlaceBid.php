<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceBid extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getItem()
    {
        return $this->hasOne(Item::class,'id','item_id');
    }
}
