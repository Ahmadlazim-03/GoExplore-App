<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $primaryKey = 'idDestination';

    protected $fillable = [
        'Name_Destination', 'Locations', 'Description', 
        'Price_perticket', 'Available_seat', 'Image', 
        'Category', 'Opening_hours', 'tgl'
    ];

   
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'destinations_id');
    }

    
    public function eTickets()
    {
        return $this->hasMany(E_ticket::class, 'destination_id');
    }
}
