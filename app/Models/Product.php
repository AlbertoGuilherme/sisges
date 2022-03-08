<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','name','title', 'price', 'description'];
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
