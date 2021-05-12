<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
     protected $fillable = [
'date',
'user',
'type',
'adder',
'hours',
'timezone',
'invoice',
'fees',
'transfer_fees',
'extra_payment'
     ];
}
