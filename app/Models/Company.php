<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function subscription()
    {
        return $this->belongsTo('App\Models\Subscription');
    }

    public function modules()
    {
        return $this->belongsToMany('App\Models\Module','company_modules');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function userRole()
    {
        return $this->belongsTo('App\Models\UserRole');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User',"user_companies");
    }
}
