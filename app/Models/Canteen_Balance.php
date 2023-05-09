<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canteen_Balance extends Model
{
    protected $table = 'canteen_balance';
    use HasFactory;

    protected $fillable = ['date','opening_balance','new_balance'];
}
