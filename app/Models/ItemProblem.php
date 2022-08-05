<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemProblem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getProblem(){
        return $this->hasOne(ItemReport::class, 'id','problem');
    }

    public function getItem(){
        return $this->hasOne(Item::class, 'id', 'item_id');
    }

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
