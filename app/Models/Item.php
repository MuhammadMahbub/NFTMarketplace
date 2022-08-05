<?php

namespace App\Models;

use App\Models\NFTCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_category(){
        return $this->hasOne(NFTCategory::class, 'id', 'category_id');
    }

    public function get_creator(){
        return $this->hasOne(User::class, 'id','creator_id');
    }

    public function getProperty(){
        return $this->hasMany(ItemProperty::class, 'item_id','id');
    }

}
