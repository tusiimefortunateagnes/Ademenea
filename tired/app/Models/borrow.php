<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrow extends Model
{   
    protected $table = 'borrow';
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(users::class);
    }

    public function borrowedgeneralitems()
    {
        return $this->hasMany(borrowedgeneralitems::class);
    }

    public function borrowedtrackableitems()
    {
        return $this->hasMany(borrowedtrackableitems::class);
    }
    
}
