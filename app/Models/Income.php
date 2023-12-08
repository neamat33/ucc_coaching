<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(IncomeCategory::class,'category_id','id');
    }

}
