<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class E_ticket extends Model
{
    use HasFactory;

    protected $table = 'e_tickets';

    protected $primaryKey = 'ticket_id';

    protected $fillable = [
        'bookings_id', 'users_id', 'destination_id', 'order_id',
        'ticket_code', 'issue_date', 'valid_until',
        'qr_code', 'status',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookings_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id');
    }
}
