<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apoinment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'age',
        'contact',
        'gender',
        'village',
        'thana',
        'district',
        'date',
        'consultant',
        'reffered',
        'token',
        'total',
        'paid',
        'em_id',
        'past',
        'con_id',
    ];
}
