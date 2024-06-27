<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrowedgeneralitems extends Model
{   
    protected $table = "borrowedgeneralitems";
    use HasFactory;

    public function order()
{
    return $this->belongsTo(borrow::class);
}

}
