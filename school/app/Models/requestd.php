<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestd extends Model
{
    use HasFactory;
        protected $fillable = [
        'notification',
        'sql',
        'users',
        'requested',
        'approved',
    ];
}
