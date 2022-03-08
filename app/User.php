<?php

namespace App;

use App\Models\Order;
use App\Models\Profile;
use App\Models\Complain;
use App\Models\Traits\UserACLTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable,  UserACLTrait;

    public function scopeTenantUser(Builder $query)
    {
        return $query->where('id', auth()->user()->id);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'profile_id','sigu', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
        {
            return $this->hasMany(Order::class);
        }
        public function complains()
        {
            return $this->hasMany(Complain::class);
        }

        public function profile()
        {
            return $this->belongsTo(Profile::class);
        }
}
