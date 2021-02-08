<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Sale extends Authenticatable
{

    protected $casts = [
        'created_at' => 'date',
        'date' => 'date',
    ];

    public function salenote()
    {
        return $this->belongsToMany('App\Models\SaleNote');
    }

}
