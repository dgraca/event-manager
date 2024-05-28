<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'access_ticket_id',
        'payment_method',
        'approved',
        'paid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accessTickets()
    {
        return $this->hasMany(AccessTicket::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
