<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'idpayment';

    protected $fillable = [
        'bookings_id', 'amount', 'payment_method', 
        'payment_date', 'transaction_id'
    ];

   
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'bookings_id');
    }


    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
