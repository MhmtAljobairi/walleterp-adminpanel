<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SaleTask extends Authenticatable
{

    protected $casts = [
        'created_at' => 'date',
        'due_date' => 'date',
    ];


    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    } public function sale()
    {
        return $this->belongsTo('App\Models\Sale');
    }
}
