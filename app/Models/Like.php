<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function get_liker(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getItem(){
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
}
