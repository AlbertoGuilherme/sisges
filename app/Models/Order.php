<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id','user_id','own_name','identify', 'total','comment', 'status', 'reup'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
