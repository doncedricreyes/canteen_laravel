<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable=['lastname','firstname','middlename','rfid','balance','email','level','section','status','discount','limit'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function balance_histories()
    {
        return $this->hasMany(BalanceHistory::class);
    }
}
