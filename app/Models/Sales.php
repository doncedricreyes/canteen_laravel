<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [    
    'order_id',
    'customer_id',
    'item_id',
    'item_name',
    'qty',
    'price',
    'mop',
    'status',
    'amount_paid',
    'change',
    'total_amount',];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
