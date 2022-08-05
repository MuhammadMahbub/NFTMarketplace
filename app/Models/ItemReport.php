<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemReport extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function get_problem(){
        return $this->hasOne(ItemProblem::class, 'id', 'problem');
    }

}
