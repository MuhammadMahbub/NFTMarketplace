<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NFTCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_user(){
        return $this->belongsTo(User::class,'creator_id');
    }
}
