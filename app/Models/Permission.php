<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
        protected $fillable = ['name', 'description'];
        /**
         * Get all Profiles that is attached with Permissions
         */
        public function profiles()
        {
            return $this->belongsToMany(Profile::class);
        }
}
