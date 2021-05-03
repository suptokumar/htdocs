<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
     protected $fillable = [
		'name',
		'payment',
		'last_paid',
		'rate',
		'key',
		'child',
		'hours',
		'email',
		'invoice_number',
		'payment_plan',
		'payment_usd',
		'last_payment_date',
		'phone'
    ];
}
