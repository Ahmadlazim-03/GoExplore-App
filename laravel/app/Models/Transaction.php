<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'payment_type',
        'amounts',
        'currency',
        'transaction_date',
        'transaction_status',
        'order_id',
        'payment_id',
        'remarks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
