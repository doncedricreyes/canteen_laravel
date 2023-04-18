<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','qty','buy_price','sell_price','status','pic','category_id','remove'];


    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}

