<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'report_by');
    }
    public function getReportCat(){
        return $this->hasOne(ItemReport::class, 'id', 'report_id');
    }
}
