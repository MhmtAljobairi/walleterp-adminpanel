<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Ticket extends Authenticatable {

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }


    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function ticket_status()
    {
        return $this->belongsTo('App\Models\TicketStatus');
    }

}
