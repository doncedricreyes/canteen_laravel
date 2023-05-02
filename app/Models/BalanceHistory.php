<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceHistory extends Model
{

    protected $fillable = ['customer_id','old_balance','added_balance','new_balance'];
    use HasFactory;

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
}
