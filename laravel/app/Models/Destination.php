<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destinations';

    protected $primaryKey = 'idDestination';

    protected $fillable = [
        'Name_Destination', 'Locations', 'Link_Location', 'Description',
        'Price_perticket', 'Available_seat', 'Image',
        'Category', 'Opening_hours', 'tgl',
    ];

    public function eTickets()
    {
        return $this->hasMany(E_ticket::class, 'destination_id');
    }
}
