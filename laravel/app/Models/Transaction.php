<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $primaryKey = 'idtransaction';

    protected $fillable = [
        'payment_id', 'users_id', 'transaction_type', 
        'amounts', 'transaction_date', 'status', 'remarks'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
}
