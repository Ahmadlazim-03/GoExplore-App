<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'idBookings';

    protected $fillable = [
        'users_id', 'destinations_id', 'booking_date', 
        'total_price', 'number_of_ticket', 'payment_status', 
        'booking_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destinations_id');
    }

   
    public function payments()
    {
        return $this->hasMany(Payment::class, 'bookings_id');
    }


    public function eTickets()
    {
        return $this->hasMany(E_ticket::class, 'bookings_id');
    }
}
