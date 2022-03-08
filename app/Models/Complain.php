<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $fillable = ['user_id','own_name','name','comment', 'identify','status'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
